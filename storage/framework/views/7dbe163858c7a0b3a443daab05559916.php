 <style>
     .contact-section {
         direction: rtl;
     }

     /* Card style */
     .contact-card,
     .contact-form-card {
         background:
         border-radius: 16px;
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
         border: 1px solid #f1f1f1;
     }


     /* Inputs */
     .input-modern {
         border-radius: 12px;
         border: 1px solid #e5e7eb;
         padding: 12px 14px;
         transition: 0.3s ease;
         font-size: 14px;
     }

     .input-modern:focus {
         border-color: #6366f1;
         box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
     }

     /* Button */
     .btn-modern {
         background: linear-gradient(135deg, #6366f1, #4f46e5);
         color: #fff;
         padding: 12px;
         border-radius: 12px;
         font-weight: 600;
         transition: 0.3s;
         border: none;
     }

     .btn-modern:hover {
         transform: translateY(-2px);
         box-shadow: 0 10px 20px rgba(79, 70, 229, 0.25);
     }

     /* Map */
     .map-box iframe {
         width: 100%;
         border-radius: 12px;
         overflow: hidden;
         border-radius: 10px;
     }

     .label-modern {
         width: 17%;
         margin-bottom: 6px;
         display: inline-block;
         letter-spacing: 0.2px;
     }
 </style>
 <div class="container-fluid py-5">
     <?php if(session('success')): ?>
         <div id="toast-success" class="span-success">
             <div class="icon">✓</div>
             <div class="message"><?php echo e(session('success')); ?></div>
         </div>
     <?php endif; ?>
     <div class="contact-section container py-5">

         <div class="row g-4 align-items-start d-flex justify-content-center align-items-center">

             <!-- Contact Info -->
             <div class="col-lg-5" style="color: #fff">

                 <div class="contact-card p-4 h-100 text-white"
                     style="background: linear-gradient(135deg, #6366f1, #ab46e5); border-radius: 5px">

                     <h3 class="mb-4 title-section" style="color: #fff">تواصل معنا</h3>

                     <?php if($contact['phone']): ?>
                         <div class="mb-3">
                             <strong>الهاتف:</strong>
                             <span class="text-muted"><?php echo e($contact['phone']); ?></span>
                         </div>
                     <?php endif; ?>

                     <?php if($contact['email']): ?>
                         <div class="mb-3">
                             <strong>البريد:</strong>
                             <a href="mailto:<?php echo e($contact['email']); ?>" class="text-decoration-none">
                                 <?php echo e($contact['email']); ?>

                             </a>
                         </div>
                     <?php endif; ?>

                     <?php if($contact['address']): ?>
                         <div class="mb-3">
                             <strong>العنوان:</strong>
                             <span class="text-muted"><?php echo e($contact['address']); ?></span>
                         </div>
                     <?php endif; ?>

                     <?php if($contact['working_hours']): ?>
                         <div class="mb-3">
                             <strong>ساعات العمل:</strong>
                             <span class="text-muted"><?php echo e($contact['working_hours']); ?></span>
                         </div>
                     <?php endif; ?>

                     <?php if($contact['map_embed']): ?>
                         <div class="map-box mt-4">
                             <?php echo $contact['map_embed']; ?>

                         </div>
                     <?php endif; ?>
                     <div class="map-box">
                         <iframe
                             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.441086644419!2d55.26971831500001!3d24.99924898402586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f434a7b8c8b9%3A0x6d9c8b1e5a0c8e!2sAl%20Mansoor%20Center!5e0!3m2!1sen!2sae!4v1700000000000!5m2!1sen!2sae"
                             width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                             referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                 </div>
             </div>

             <!-- Form -->
             <div class="col-lg-7">

                 <div class="contact-form-card p-4 h-100">

                     <h3 class="mb-4 title-section">أرسل رسالة</h3>

                     <form method="post" action="<?php echo e(route('contact.store')); ?>" class="row g-3">
                         <?php echo csrf_field(); ?>

                         <div class="col-md-6">
                             <label class="form-label label-modern">الاسم</label>
                             <input type="text" name="name" class="form-control input-modern"
                                 value="<?php echo e(old('name')); ?>" required dir="rtl">
                         </div>

                         <div class="col-md-6">
                             <label class="form-label label-modern">البريد الإلكتروني</label>
                             <input type="email" name="email" class="form-control input-modern"
                                 value="<?php echo e(old('email')); ?>" required dir="rtl">
                         </div>

                         <div class="col-md-6">
                             <label class="form-label label-modern">الهاتف</label>
                             <input type="text" name="phone" class="form-control input-modern"
                                 value="<?php echo e(old('phone')); ?>" dir="rtl">
                         </div>

                         <div class="col-md-6">
                             <label class="form-label label-modern">الموضوع</label>
                             <input type="text" name="subject" class="form-control input-modern"
                                 value="<?php echo e(old('subject')); ?>" dir="rtl">
                         </div>

                         <div class="col-12">
                             <label class="form-label label-modern">الرسالة</label>
                             <textarea name="message" class="form-control input-modern" cols="20" rows="5" required dir="rtl"
                                 style="width: 92%"><?php echo e(old('message')); ?></textarea>
                         </div>

                         <div class="col-12 mt-2">
                             <button type="submit" class="btn btn-modern w-100">
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
             toast.remove(2000);
         }
     }, 4000);
 </script>
<?php /**PATH C:\Users\Pro Book\Desktop\school_fixed\resources\views/frontend/partials/contact-part.blade.php ENDPATH**/ ?>