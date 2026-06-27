<?php $__env->startSection('title', 'تبرع — ' . ($siteName ?? 'مدرسة شمس المعرفة')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .donation-hero {
        background: linear-gradient(135deg, rgba(111, 45, 189, 0.95) 0%, rgba(139, 197, 63, 0.85) 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .donation-hero::before {
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
    
    .donation-hero::after {
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
    
    .donation-page {
        background: #f8f7ff;
        min-height: 60vh;
        padding: 60px 20px;
    }

    .donation-content {
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }

    .donation-title {
        color: #fff;
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 15px;
        font-family: 'Cairo', sans-serif;
    }

    .donation-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 20px;
        font-weight: 500;
        font-family: 'Cairo', sans-serif;
    }

    .qr-container {
        display: flex;
        gap: 50px;
        justify-content: center;
        flex-wrap: wrap;
        margin: 60px 0;
    }

    .qr-item {
        background: #fff;
        padding: 40px;
        border-radius: 25px;
        box-shadow: 0 15px 50px rgba(111, 45, 189, 0.15);
        text-align: center;
        min-width: 280px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .qr-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
    }

    .qr-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 70px rgba(111, 45, 189, 0.25);
    }

    .qr-code {
        width: 220px;
        height: 220px;
        margin: 0 auto 25px;
        border: 4px solid var(--primary);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        transition: all 0.3s ease;
    }
    
    .qr-item:hover .qr-code {
        border-color: var(--secondary);
        transform: scale(1.05);
    }

    .qr-code img {
        max-width: 100%;
        max-height: 100%;
    }

    .qr-label {
        color: var(--primary);
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 25px;
        font-family: 'Cairo', sans-serif;
    }

    .donate-btn {
        display: inline-block;
        padding: 15px 45px;
        background: linear-gradient(135deg, var(--secondary), var(--secondary-dark));
        color: #fff;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 18px;
        font-family: 'Cairo', sans-serif;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(139, 197, 63, 0.3);
    }

    .donate-btn:hover {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(111, 45, 189, 0.5);
    }

    .back-home {
        margin-top: 50px;
    }

    .back-home a {
        color: var(--primary);
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        font-family: 'Cairo', sans-serif;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 15px 35px;
        background: #fff;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(111, 45, 189, 0.15);
    }

    .back-home a:hover {
        background: var(--primary);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(111, 45, 189, 0.4);
    }

    @media (max-width: 768px) {
        .qr-container {
            gap: 30px;
        }
        .qr-item {
            min-width: 220px;
            padding: 30px;
        }
        .qr-code {
            width: 180px;
            height: 180px;
        }
        .donation-title {
            font-size: 36px;
        }
        .donation-subtitle {
            font-size: 16px;
        }
        .donate-btn {
            padding: 12px 35px;
            font-size: 16px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <div class="donation-hero container-fluid">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="donation-title">مدرسة شمس المعرفة</h1>
                    <p class="donation-subtitle">ساهم في بناء مستقبل أطفالنا عبر التبرع</p>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-page container-fluid">
        <div class="donation-content">
            <div class="qr-container">
                <div class="qr-item fade-in-up">
                    <div class="qr-code">
                        <img src="<?php echo e(asset('frontend/imgs/binance-qr-placeholder.png')); ?>" alt="Binance QR Code" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=TKHCtsRSqCnNsZyUMBT3hpYtEM1jbXNLBm'">
                    </div>
                    <div class="qr-label">تبرع عبر Binance</div>
                    <a href="https://www.binance.com/en/donate/crypto/TKHCtsRSqCnNsZyUMBT3hpYtEM1jbXNLBm" target="_blank" class="donate-btn">
                        <i class="fas fa-heart me-2"></i>
                        تبرع الآن
                    </a>
                </div>
                
                <div class="qr-item fade-in-up" style="animation-delay: 0.2s;">
                    <div class="qr-code">
                        <img src="<?php echo e(asset('frontend/imgs/gofundme-qr-placeholder.png')); ?>" alt="GoFundMe QR Code" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=https://www.gofundme.com/f/help-provide-a-safe-learning-space-in-gaza'">
                    </div>
                    <div class="qr-label">تبرع عبر GoFundMe</div>
                    <a href="https://www.gofundme.com/f/help-provide-a-safe-learning-space-in-gaza" target="_blank" class="donate-btn">
                        <i class="fas fa-heart me-2"></i>
                        تبرع الآن
                    </a>
                </div>
            </div>
            
            <div class="back-home fade-in-up" style="animation-delay: 0.4s;">
                <a href="<?php echo e(route('home')); ?>">
                    <i class="fas fa-arrow-right"></i>
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pro Book\Downloads\school_fixed_updated_1\school_fixed\resources\views/frontend/pages/apps.blade.php ENDPATH**/ ?>