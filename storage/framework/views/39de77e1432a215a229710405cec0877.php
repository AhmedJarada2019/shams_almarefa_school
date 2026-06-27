<?php $__env->startSection('page_title', $item->exists ? 'تعديل وسيط' : 'وسيط جديد'); ?>
<?php $__env->startSection('content'); ?>
    <form method="post"
        action="<?php echo e($item->exists ? route('admin.media-items.update', $item) : route('admin.media-items.store')); ?>"
        enctype="multipart/form-data" class="card card-custom">
        <?php echo csrf_field(); ?> <?php if($item->exists): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="card-body">
            <div class="form-group"><label>العنوان</label><input name="title" class="form-control"
                    value="<?php echo e(old('title', $item->title)); ?>" required dir="rtl"></div>
            <div class="form-group"><label>التصنيف</label><select name="media_category_id" class="form-control">
                    <option value="">—</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php if(old('media_category_id', $item->media_category_id) == $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></div>
            <div class="form-group"><label>النوع</label><select name="type" class="form-control">
                    <option value="image" <?php if(old('type', $item->type) == 'image'): echo 'selected'; endif; ?>>صورة</option>
                    <option value="video" <?php if(old('type', $item->type) == 'video'): echo 'selected'; endif; ?>>فيديو</option>
                </select></div>
            <div class="form-group"><label>الملف</label><input type="file" name="file"
                    <?php echo e($item->exists ? '' : 'required'); ?>></div>
            <div class="form-group"><label>صورة مصغرة</label><input type="file" name="thumbnail"></div>

             <?php if($item->thumbnail_path): ?>
                    <img src="<?php echo e(media_url($item->thumbnail_path)); ?>" height="60" class="d-block mt-2">
                <?php endif; ?>
            <div class="form-group"><label>رابط فيديو خارجي (embed)</label><input name="external_url" class="form-control"
                    value="<?php echo e(old('external_url', $item->external_url)); ?>" dir="ltr"></div>
            <div class="form-group"><label>الوصف</label>
                <textarea data-quill="true" name="description" class="form-control" dir="rtl"><?php echo e(old('description', $item->description)); ?></textarea>
            </div>
            <div class="form-group"><label>الترتيب</label><input type="number" name="sort_order" class="form-control"
                    value="<?php echo e(old('sort_order', $item->sort_order ?? 0)); ?>"></div>
            <div class="form-check mb-3"><input type="checkbox" name="is_active" value="1"
                    <?php if(old('is_active', $item->is_active ?? true)): echo 'checked'; endif; ?>><label>نشط</label></div>
            <button class="btn btn-primary">حفظ</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/admin/media-items/form.blade.php ENDPATH**/ ?>