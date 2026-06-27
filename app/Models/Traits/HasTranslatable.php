<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Nette\NotImplementedException;

/**
 * @mixin Model
 */
trait HasTranslatable
{
    protected ?string $translationLocale = null;

    public static function usingLocale(string $locale): self
    {
        return (new self())->setLocale($locale);
    }

    public function getAttribute($key)
    {
        if (!$this->isTranslatableAttribute($key)) {
            return parent::getAttribute($key);
        }

        return $this->getTranslation($key, $this->getLocale());
    }

    public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true): mixed
    {
        $translation = parent::getAttribute($key . '_' . $locale)
            ?? parent::getAttribute($key . '_' . App::getLocale());

        if ($this->hasGetMutator($key)) {
            return $this->mutateAttribute($key, $translation);
        }

        return $translation;
    }

    public function isTranslatableAttribute(string $key): bool
    {
        return in_array($key, $this->getTranslatableAttributes());
    }

    public function setLocale(string $locale): self
    {
        $this->translationLocale = $locale;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->translationLocale ?: App::getLocale();
    }

    public function getTranslatableAttributes(): array
    {
        if (!isset($this->translatable)) {
            throw new NotImplementedException('You should define "$translatable" property as array in the model');
        }

        return is_array($this->translatable)
            ? $this->translatable
            : [];
    }

    public function getCasts(): array
    {
        return array_merge(
            parent::getCasts(),
            array_fill_keys($this->getTranslatableAttributes(), 'string'),
        );
    }
}
