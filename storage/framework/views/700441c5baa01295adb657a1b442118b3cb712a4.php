<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/shop/css\bootstrap.css" />
    <link rel="stylesheet" href="/shop/css\owl.carousel.min.css" />
    <link rel="stylesheet" href="/shop/css\owl.theme.default.min.css" />
    <link rel="stylesheet" href="/shop/css/style.css" />
    <link rel="stylesheet" href="/shop/css/style_by.css" />
    <link rel="stylesheet" href="/shop/css/mdia.css" />
    <link rel="stylesheet" href="/shop/css/mdia_by.css" />
    <link rel="stylesheet" href="/shop/css/icon.css" />
    <!--================css======================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <div class="section1">
            <div class="section1_1">
                <p> <?php echo e($product->name); ?>:نام </p>
                <p>دسته بندی : موبایل</p>
                <p>سرویس ویژه دیجیتال مارمت : 7 روز تضمین تعویض کالا</p>
                <p>فروشنده : بوسمن</p>
                <p>رضایت خرید :53%</p>
                <p>لوزم جانبی:یک شارژر،یک هنزفری،یک قاب شفاف</p>
                <h4 style="color: #ed5314"> تومان<?php echo e($product->price); ?></h4>
                <div>
                    <button class="main_by">سفارش مستقیم</button>
                    <button class="add_shop_box">افزودن به سبد خرید<i class="material-icons-outlined">shopping_cart</i></button>
                </div>
                <?php if(session()->exists('User')): ?>
                    <script>
                        $('.add_shop_box').click(function (e) { 
                            $.ajax({
                                type: "post",
                                url: "/bypage/add_shop_box",
                                data: {
                                    user:<?php echo e(session()->get('User')['id']); ?>,
                                    product:{
                                       'id' :<?php echo e($product->id); ?>,
                                       'name' : '<?php echo e($product->name); ?>',
                                       'image' : '<?php echo e($product->image); ?>'
                                    },
                                },
                                success: function (response) {
                                    alert('عملیات موفق')
                                    document.location.reload(true)
                                }
                            });
                        });
                    </script>
                <?php else: ?>
                <script>
                    $('.add_shop_box').click(function (e) { 
                       alert('ابتدا وارد حساب کاربری شوید')
                    });
                </script>
                <?php endif; ?>
            </div>
            <div class="section1_2">
                <img src="<?php echo e($product->image); ?>" alt="" />
            </div>
        </div>
        <div class="svg">
            <div>
                <img src="/shop/img/serv3.png" alt="" />
                <p>ضمانت اصل بودن کالا</p>
            </div>
            <div>
                <img src="/shop/img/serv1.png" alt="" />
                <p>هفت روز صمانت بازگشت</p>
            </div>
            <div>
                <img src="/shop/img/serv2.png" alt="" />
                <p>پرداخت درب منزل</p>
            </div>
            <div>
                <img src="/shop/img/serv4.png" alt="" />
                <p>پشتیبانی همه روزه</p>
            </div>
        </div>
        <div class="by_section2">
            <h2>مشخصات خود را وراد کنید:</h2>
            <br />
            <form action="<?php echo e(route('byed', ['id' => $product->id])); ?>" class="form-group" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <label>نام و نام خوانوادگی گیرنده:</label>
                <input type="text" name="name" class="name2 form-control" value="<?php echo e(old('name')); ?>" aria-label="" /><br />
                <label>شهر محل سکونت:</label>
                <select name="city" aria-label="" class="form-control">
                    <option value="tehran">تهران</option>
                    <br />
                </select>
                <br />
                <label>ادرس محل سکونت</label>
                <br>
                <textarea name="address" style="margin: 0 0 12xx 0" class="form-control" value="<?php echo e(old('address')); ?>"></textarea>
                <label> شماره تلفن</label>
                <input name="phon" style="width: 50%; margin-top: 16px" <?php echo e(old('phon')); ?> type="tel" aria-label=""
                    class="form-control phon_number2" />
                <div class="button_form">
                    <button style="margin-top: 15px" class="button_add2">ارسال</button>
                    <button style="margin-top: 15px" onclick="event.preventDefault(false)" class="button_cancel2">
                        cancel
                    </button>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="display: block" class="login_erore2">نام را صیحی وارد کنید</p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['phon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="display: block" class="login_erore2">شماره تلفن صحیح نمی باشد</p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </form>
        </div>
        <div class="section3_by">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#a" class="nav-link active" role="tab" data-toggle="tab">مشخصات
                        <span class="material-icons"> circle_notifications </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#b" class="nav-link" data-toggle="tab">نظر کاربران
                        <span class="material-icons-outlined"> question_answer </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#c" class="nav-link" data-toggle="tab">پرسش و پاسخ
                        <span class="material-icons-outlined"> help </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active show" id="a">
                    <h4>مشخصات فنی کالا:</h4>
                    <table class="table table-hover">
                        <?php $__currentLoopData = $attrbute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item); ?></td>
                                <td><?php echo e($val); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="b">
                    <?php if(session()->exists('User')): ?>
                        <h5>نظر خود را راجب محصول وارد کنید:</h5>
                        <form method="POST" action="<?php echo e(route('setidia', ['id' => $product->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <textarea name="comment" class="nazar_my form-control"></textarea>
                            <p>ایا از محصول راضی بودید</p>
                            بله<input type="radio" name="idia" value="yes" id="">
                            خیر<input type="radio" name="idia" value="no" id="">
                            <input type="submit" class="" value="ثبت نظر" />
                        </form>
                    <?php endif; ?>
                    <?php
                        $idaiCount = count(json_decode($product->idia));
                        if ($idaiCount != 0) {
                            $yes = 0;
                            $no = 0;
                            foreach (json_decode($product->idia) as $key => $value) {
                                if ($value == 'yes') {
                                    $yes++;
                                } else {
                                    $no++;
                                }
                            }
                            $yesd = round(($yes * 100) / $idaiCount);
                            $nod = round(($no * 100) / $idaiCount);
                        } else {
                            $yes = 0;
                            $no = 0;
                            $yesd = 0;
                            $nod = 0;
                        }
                    ?>
                    <h4>میزان رظایت مشتری:</h4>
                    مجموع نظرات : <?php echo e($idaiCount); ?>

                    <br>
                    رضایت:
                    <span style="
                                        width: 12px;
                                        height: 12px;
                                        background: #415eff;
                                        display: inline-block;
                                      "></span><?php echo e($yes); ?>

                    <br>
                    انتقاد:
                    <span style="
                                        width: 12px;
                                        height: 12px;
                                        background: #fb3838;
                                        display: inline-block;
                                      "></span><?php echo e($no); ?>


                    <div class="progress" style="height: 35px">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
                            style="width: <?php echo e($yesd); ?>%; height: 35px">
                            <?php echo e($yesd); ?>

                        </div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                            style="width: <?php echo e($nod); ?>%; height: 35px">
                            <?php echo e($nod); ?>

                        </div>
                    </div>
                    <br />
                    <p> <?php echo e($yesd); ?> این محصول را پسندیدند</p>
                    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="nazar">
                            <img class="nazar1" style="
                                          background: url(img/user1.jpg);
                                          background-size: 100% 100%;
                                        ">
                            <div class="nazar2">
                                <h5><?php echo e($item->user_id->username); ?>:</h5>
                                <p>
                                    <?php echo e($item->comment); ?>

                                </p>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="c">
                    <h5>پرسش خود را مطرح کنید:</h5>
                    <form>
                        <textarea class="nazar_my form-control"></textarea>
                        <input type="button" class="" value="ثبت پرسش" />
                    </form>
                    <div class="nazar">
                        <div class="nazar1" style="
                                          background: url(img/user1.jpg);
                                          background-size: 100% 100%;
                                        "></div>
                        <div class="nazar2">
                            <h5>رضا بیگی:</h5>
                            <p>
                                .محصول قابل توجه و مفید برای کا های منزل و اداری پیشنهاد میکنم
                                حتما این محصول رئو خریداری کنید
                            </p>
                        </div>
                    </div>
                    <div class="nazar">
                        <div class="nazar1" style="
                                          background: url(img/user2.jpg);
                                          background-size: 100% 100%;
                                        "></div>
                        <div class="nazar2">
                            <h5>ادمین:</h5>
                            <p>
                                .محصول قابل توجه و مفید برای کا های منزل و اداری پیشنهاد میکنم
                                حتما این محصول رئو خریداری کنید
                            </p>
                        </div>
                    </div>
                    <div class="nazar">
                        <div class="nazar1" style="
                                          background: url(img/user1.jpg);
                                          background-size: 100% 100%;
                                        "></div>
                        <div class="nazar2">
                            <h5>رضا بیگی:</h5>
                            <p>
                                .محصول قابل توجه و مفید برای کا های منزل و اداری پیشنهاد میکنم
                                حتما این محصول رئو خریداری کنید
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <?php
    if (session()->get('byed')) {
        echo '<script>
            alert(" برای تایید با شما تماس گرفته خواهد شد")
        </script>';
    }
    ?>
    <?php $__errorArgs = ['phon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <script>
            $(".by_section2").fadeIn();
            var w = innerWidth;
            if (w >= 1000) {
                $("html,body").animate({
                    scrollTop: 950
                }, "2000");
            } else {
                $("html,body").animate({
                    scrollTop: 1380
                }, "2000");
            }
        </script>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('shop.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/madhi/Documents/shop/resources/views/shop/by.blade.php ENDPATH**/ ?>