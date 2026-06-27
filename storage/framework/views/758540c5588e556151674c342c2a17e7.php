<?php $__env->startSection('title', 'اتصل بنا — ' . $siteName); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .contact-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .contact-hero::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        filter: blur(60px);
    }
    
    .contact-hero::after {
        content: '';
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        filter: blur(80px);
    }
    
    .contact-section {
        direction: rtl;
    }

    /* Card style */
    .contact-card,
    .contact-form-card {
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 15px 50px rgba(111, 45, 189, 0.1);
        border: 1px solid rgba(111, 45, 189, 0.1);
        padding: 40px;
        transition: all 0.3s ease;
    }
    
    .contact-card:hover,
    .contact-form-card:hover {
        box-shadow: 0 20px 60px rgba(111, 45, 189, 0.15);
        transform: translateY(-5px);
    }

    /* Titles */
    .title-section {
        font-weight: 800;
        font-size: 28px;
        color: var(--primary);
        margin-bottom: 25px;
    }

    /* Contact Info Items */
    .contact-info-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
        padding: 15px;
        background: #f8f7ff;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:hover {
        background: #f0edff;
        transform: translateX(-5px);
    }
    
    .contact-info-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
        flex-shrink: 0;
    }
    
    .contact-info-text strong {
        display: block;
        color: var(--primary);
        font-size: 14px;
        margin-bottom: 5px;
    }
    
    .contact-info-text span,
    .contact-info-text a {
        color: #555;
        font-size: 15px;
        text-decoration: none;
    }

    /* Inputs */
    .input-modern {
        width: 100% !important;
        border-radius: 16px;
        border: 2px solid #e5e7eb;
        padding: 15px 18px;
        transition: 0.3s ease;
        font-size: 15px;
        background: #f8f7ff;
    }

    .input-modern:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(111, 45, 189, 0.1);
        background: #fff;
    }

    /* Button */
    .btn-modern {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        padding: 15px 30px;
        border-radius: 50px;
        font-weight: 700;
        transition: 0.3s;
        border: none;
        font-size: 16px;
    }

    .btn-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(111, 45, 189, 0.4);
    }

    /* Map */
    .map-box iframe {
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .label-modern {
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    /* Toast */
    #toast-success {
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        color: #fff;
        padding: 20px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(139, 197, 63, 0.4);
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 15px;
        animation: slideIn 0.5s ease;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    #toast-success .icon {
        width: 35px;
        height: 35px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: bold;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="contact-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 style="color: #fff; font-size: 48px; font-weight: 800; margin-bottom: 15px;">اتصل بنا</h1>
                    <p style="color: rgba(255, 255, 255, 0.9); font-size: 20px; font-weight: 500;">نحن هنا لمساعدتك، تواصل معنا في أي وقت</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5" style="background: #f8f7ff;">
        <?php if(session('success')): ?>
            <div id="toast-success">
                <div class="icon">✓</div>
                <div class="message"><?php echo e(session('success')); ?></div>
            </div>
        <?php endif; ?>
        <div class="contact-section container py-5">

            <div class="row g-4 align-items-start">

                <!-- Contact Info -->
                <div class="col-lg-5">

                    <div class="contact-card h-100 fade-in-left">

                        <h3 class="title-section">معلومات التواصل</h3>

                        <?php if($contact['phone']): ?>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-info-text">
                                    <strong>الهاتف</strong>
                                    <span><?php echo e($contact['phone']); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($contact['email']): ?>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <strong>البريد الإلكتروني</strong>
                                    <a href="mailto:<?php echo e($contact['email']); ?>">
                                        <?php echo e($contact['email']); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($contact['address']): ?>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <strong>العنوان</strong>
                                    <span><?php echo e($contact['address']); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($contact['working_hours']): ?>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="contact-info-text">
                                    <strong>ساعات العمل</strong>
                                    <span><?php echo e($contact['working_hours']); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($contact['map_embed']): ?>
                            <div class="map-box mt-4">
                                <?php echo $contact['map_embed']; ?>

                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- Form -->
                <div class="col-lg-7">

                    <div class="contact-form-card h-100 fade-in-right">

                        <h3 class="title-section">أرسل رسالة</h3>

                        <form method="post" action="<?php echo e(route('contact.store')); ?>" class="row g-3">
                            <?php echo csrf_field(); ?>

                            <div class="col-md-6">
                                <label class="form-label label-modern">الاسم</label>
                                <input type="text" name="name" class="form-control input-modern"
                                    value="<?php echo e(old('name')); ?>" required dir="rtl" placeholder="أدخل اسمك">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label label-modern">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control input-modern"
                                    value="<?php echo e(old('email')); ?>" required dir="rtl" placeholder="أدخل بريدك الإلكتروني">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label label-modern">الهاتف</label>
                                <input type="text" name="phone" class="form-control input-modern"
                                    value="<?php echo e(old('phone')); ?>" dir="rtl" placeholder="أدخل رقم هاتفك">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label label-modern">الموضوع</label>
                                <input type="text" name="subject" class="form-control input-modern"
                                    value="<?php echo e(old('subject')); ?>" dir="rtl" placeholder="موضوع الرسالة">
                            </div>

                            <div class="col-12">
                                <label class="form-label label-modern">الرسالة</label>
                                <textarea name="message" class="form-control input-modern" cols="20" rows="5" required dir="rtl"
                                    placeholder="اكتب رسالتك هنا..."><?php echo e(old('message')); ?></textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-modern w-100">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    إرسال الرسالة
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if (toast) {
                toast.style.animation = 'slideIn 0.5s ease reverse';
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }
        }, 4000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/pages/contact.blade.php ENDPATH**/ ?>