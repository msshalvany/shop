  
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="shop/css\bootstrap.css" />
<link rel="stylesheet" href="shop/css\owl.carousel.min.css" />
<link rel="stylesheet" href="shop/css\owl.theme.default.min.css" />
<link rel="stylesheet" href="shop/css\style.css" />
<link rel="stylesheet" href="shop/css\mdia.css" />
<link rel="stylesheet" href="shop/css\styl_grop.css" />
<link rel="stylesheet" href="shop/css\mdia_grop.css" />
<link rel="stylesheet" href="shop/css\icon.css" />
<style>
    .pagination {
        display: flex;
        width: 40%;
        justify-content: space-around;
        margin: 32px auto;
    }
    .pagination li {
        padding: 12px 20px;
    }
    .pagination li.active {
        background-color: #ed5314;
        border-radius: 10%;
       cursor: pointer;
    }
    .pagination li:nth-child(1), .pagination li:nth-last-child(1){
        background-color: #ed5314;
        border-radius: 50%;
        cursor: pointer;
    }
   .header_nav_botten1 li:nth-child(<?php echo e($categoryNumber); ?>) {
      box-shadow: #ed5314 0px 0px 10px inset;
      border-radius: 30%;
      cursor: pointer;

   }
</style>
<!--================css======================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if($productDis->hasPages()): ?>
<ul class="pagination pagination" style="display: flex">
    
    <?php if($productDis->onFirstPage()): ?>
        <li class="disabled"><span>«</span></li>
    <?php else: ?>
        <li><a href="<?php echo e($productDis->previousPageUrl()); ?>" rel="prev">«</a></li>
    <?php endif; ?>

    <?php if($productDis->currentPage() > 3): ?>
        <li class="hidden-xs"><a href="<?php echo e($productDis->url(1)); ?>">1</a></li>
    <?php endif; ?>
    <?php if($productDis->currentPage() > 4): ?>
        <li><span>...</span></li>
    <?php endif; ?>
    <?php $__currentLoopData = range(1, $productDis->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($i >= $productDis->currentPage() - 2 && $i <= $productDis->currentPage() + 2): ?>
            <?php if($i == $productDis->currentPage()): ?>
                <li class="active"><span><?php echo e($i); ?></span></li>
            <?php else: ?>
                <li><a href="<?php echo e($productDis->url($i)); ?>"><?php echo e($i); ?></a></li>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($productDis->currentPage() < $productDis->lastPage() - 3): ?>
        <li><span>...</span></li>
    <?php endif; ?>
    <?php if($productDis->currentPage() < $productDis->lastPage() - 2): ?>
        <li class="hidden-xs"><a href="<?php echo e($productDis->url($productDis->lastPage())); ?>"><?php echo e($productDis->lastPage()); ?></a></li>
    <?php endif; ?>

    
    <?php if($productDis->hasMorePages()): ?>
        <li><a href="<?php echo e($productDis->nextPageUrl()); ?>" rel="next">»</a></li>
    <?php else: ?>
        <li class="disabled"><span>»</span></li>
    <?php endif; ?>
</ul>
<?php endif; ?>
<div class="section_grop">
    <div class="section_grop1">
      <div class="grop_dasta">
        <p>دسته بندی بر اساس :</p>
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="#a" class="nav-link active" role="tab" data-toggle="tab">گران ترین</a
            >
          </li>
          <li class="nav-item">
            <a href="#b" class="nav-link" data-toggle="tab">پرفروش ها</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#c" class="nav-link" data-toggle="tab">ارزان ترین</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#d" class="nav-link" data-toggle="tab">تخفیفات</a>
          </li>
        </ul>
      </div>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade active show" id="a">
            <ul>
                <?php $__currentLoopData = $productExpi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                      <img class="pic_tag" src="<?php echo e($item->image); ?>">
                      <p><?php echo e($item->description); ?></p>
                      <a href="<?php echo e(route('bypage', ['id'=>$item->id])); ?>"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price"><?php echo e($item->price); ?>$</span>
                      <?php if($item->discount!=0): ?>
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p><?php echo e($item->discount); ?>%</p></div>
                      <?php endif; ?>
                   </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="b">
            <ul>
                <?php $__currentLoopData = $productBy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                      <img class="pic_tag" src="<?php echo e($item->image); ?>">
                      <p><?php echo e($item->description); ?></p>
                      <a href="<?php echo e(route('bypage', ['id'=>$item->id])); ?>"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price"><?php echo e($item->price); ?>$</span>
                      <?php if($item->discount!=0): ?>
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p><?php echo e($item->discount); ?>%</p></div>
                      <?php endif; ?>
                   </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="c">
            <ul>
                <?php $__currentLoopData = $productChi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                      <img class="pic_tag" src="<?php echo e($item->image); ?>">
                      <p><?php echo e($item->description); ?></p>
                      <a href="<?php echo e(route('bypage', ['id'=>$item->id])); ?>"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price"><?php echo e($item->price); ?>$</span>
                      <?php if($item->discount!=0): ?>
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p><?php echo e($item->discount); ?>%</p></div>
                      <?php endif; ?>
                   </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="d">
            <ul>
                <?php $__currentLoopData = $productDis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                      <img class="pic_tag" src="<?php echo e($item->image); ?>">
                      <p><?php echo e($item->description); ?></p>
                      <a href="<?php echo e(route('bypage', ['id'=>$item->id])); ?>"><div class="section1_1_by"><i class="material-icons-outlined">shopping_cart</i></div></a>
                      <span class="price"><?php echo e($item->price); ?>$</span>
                      <?php if($item->discount!=0): ?>
                          <div class="perc_con"><img src ="shop/img/price.png" class="perc"><p><?php echo e($item->discount); ?>%</p></div>
                      <?php endif; ?>
                   </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
      </div>
    </div>

    <div class="section_grop2">
      <div class="section_grop2_1">
        <form>
        <p>جست و جو در نتایج :</p>
        <div class="grop_search">
          <input
            aria-label=""
            type="search"
            class="grop_search1"
            placeholder="نام کالا را وارد کنید......"
          />
          <div class="grop_search2">
            <i class="material-icons-outlined">search</i>
          </div>
        </div>
      </form>
      </div>
      <div class="section_grop2_2">
        <form action="">
        <label class="position-relative">
          <div>فقط موجودی ها:</div>
          <input type="checkbox" class="ios-switch" />
          <div>
            <div></div>
          </div>
        </label>
        <label class="position-relative">
          <div>فقط دارای تخفیف:</div>
          <input type="checkbox" class="ios-switch" />
          <div>
            <div></div>
          </div>
        </label>
        <br />
        <br />
        <label for="">نامه برند:</label>
        <select class="form-control" name="" id="">
          <option>همه</option>
          <option>اسیا تک</option>
          <option>پارس خزر</option>
          <option>ایران123</option>
        </select>
      </form>
        <div class="svg2">
          <div>
            <img src="shop/img/serv2.png" alt="" />
            <p>پرداخت درب منزل</p>
          </div>
          <div>
            <img src="shop/img/serv3.png" alt="" />
            <p>ضمانت اصل بودن کالا</p>
          </div>
          <div>
            <img src="shop/img/serv1.png" alt="" />
            <p>هفت روز صمانت بازگشت</p>
          </div>
          <div>
            <img src="shop/img/serv4.png" alt="" />
            <p>پشتیبانی همه روزه</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="svg">
    <div>
      <img src="img/serv3.png" alt="" />
      <p>ضمانت اصل بودن کالا</p>
    </div>
    <div>
      <img src="img/serv1.png" alt="" />
      <p>هفت روز صمانت بازگشت</p>
    </div>
    <div>
      <img src="img/serv2.png" alt="" />
      <p>پرداخت درب منزل</p>
    </div>
    <div>
      <img src="img/serv4.png" alt="" />
      <p>پشتیبانی همه روزه</p>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/madhi/Documents/shop/resources/views/shop/category.blade.php ENDPATH**/ ?>