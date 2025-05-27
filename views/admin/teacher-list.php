 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item active" aria-current="page">Danh sách hoạt động</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <a href="<?=URL_ADMIN?>them-giao-vien" class="btn btn-primary shadow me-3"><i class="fa fas fa-plus me-2"></i>Thêm cán bộ</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Nhập thông tin tìm kiếm"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <table class="sa-datatables-init" data-order="[]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="w-min">STT</th>
                            <th class="min-w-5x">Họ và tên</th>
                            <th class="min-w-5x">Số điện thoại</th>
                            <th class="min-w-5x">Năm sinh</th>
                            <th class="min-w-5x">Chức danh</th>
                            <th class="min-w-5x">Địa chỉ</th>
                            <th class="min-w-10x" data-orderable="false">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $word = 'A';
                        $arr_role = [
                            [
                                'name' => 'Giáo viên thực tập',
                                'badge' => 'primary',
                            ],
                            [
                                'name' => 'Giáo viên chính',
                                'badge' => 'success',
                            ],
                            [
                                'name' => 'Giáo viên cao cấp',
                                'badge' => 'warning',
                            ],
                        ];
                        $arr_address = ["An Giang","Bà Rịa - Vũng Tàu","Bắc Giang","Bắc Kạn","Bến Tre","Bình Định","Bình Dương","Bình Phước","Cà Mau","Cần Thơ","Đà Nẵng","Đắk Lắk","Đắk Nông","Điện Biên","Hà Giang","Hà Nam","Hà Nội","Hà Tĩnh","Hải Dương","Hải Phòng","Hòa Bình","Hưng Yên","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu","Lâm Đồng","Lạng Sơn","Nam Định","Nghệ An","Ninh Bình","Ninh Thuận","Phú Thọ","Phú Yên","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Tiền Giang","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái"];
                        for ($i=0; $i < 100; $i++) :
                            $order_role = rand(0,2);
                            $order_address = rand(0,52);
                    ?>
                        <tr class="align-middle">
                            <td class="small">
                                1
                            </td>
                            <td class="small">
                                <div class="d-flex align-items-center">
                                    <img class="thumbnail" width="40" src="<?= DEFAULT_AVATAR ?>">
                                    <div class="ms-3">
                                        <a class="text-dark" href="#"><strong>Nguyễn Văn <?= $word ?></strong></a>
                                    </div>
                                </div>
                            </td>
                            <td> 
                               <span class="small">
                                    0<?= mt_rand(900000000,999999999) ?>
                               </span>
                            </td>
                            <td class="small"> 
                                <?= date('d-m-Y', mt_rand(strtotime('1950-01-01'), strtotime('2003-12-31'))); ?>
                            <td class="small">
                                <div class="badge badge-sa-<?= $arr_role[$order_role]['badge'] ?>">
                                    <?= $arr_role[$order_role]['name'] ?>
                                </div>
                            </td>
                            <td class="small">
                                <?= $arr_address[$order_address] ?>
                            </td>
                            <td class="small">
                                <div class="d-flex gap-3">
                                    <a href="#" class="btn btn-sm btn-warning shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-edit"></i>
                                        <span class="small">Sửa</span>
                                    </a>
                                    <button name="delete" value="#" type="submit" class="btn btn-sm btn-danger shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-trash"></i>
                                        <span class="small">Xoá</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php $word++; endfor ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_SESSION['edit_category'])) {
    extract($_SESSION['edit_category'])
?>
<div class="modal fade" id="modalEditCategoryProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục ID = <?=$id?></h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
            <div class="modal-body px-5">
                <?=show_error($error_valid)?>
                <div class="form-floating mb-3">
                    <input name="name" value="<?=$name?>" type="text" class="form-control" id="name" placeholder="input">
                    <label for="name">Tên danh mục</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button name="edit_category" value="<?=$id?>" type="submit" class="btn btn-primary">Lưu</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<div id="overlay"></div>
<div id="largeImage">
    <img id="largeImageView" src="" alt="">
    <div class="text-center">
        <span class="mt-5 small text-decoration-underline text-light">Nhấn vào màn hình để tắt</span>
    </div>
</div>

<style>
    #largeImage {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        transition: transform 1s ease;
    }
    #largeImage img {
        max-width: 100%;
        max-height: 100%;
        
    }
    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 999;
    }
    .thumbnail-container {
        position: relative; /* Để định vị overlay */
        display: inline-block; /* Để chứa nội dung bên trong */
    }

    .thumbnail {
        display: block; /* Để không có khoảng cách dưới ảnh */
        transition: transform 0.2s; /* Hiệu ứng chuyển tiếp cho phóng to */
    }

    .thumbnail-container:hover .thumbnail {
        transform: scale(1.1); /* Phóng to ảnh khi hover */
    }

    .thumbnail-container:hover {
        background: rgba(0, 0, 0, 0.3); /* Nền màu đen với độ mờ */
        border: 1px dashed rgba(0, 0, 0, 0.5); /* Viền đứt nét */
    }

    .hover-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Căn giữa văn bản */
        opacity: 0; /* Ẩn văn bản ban đầu */
        transition: opacity 0.3s; /* Hiệu ứng chuyển tiếp */
    }

    .thumbnail-container:hover .hover-text {
        opacity: 1; /* Hiện văn bản khi hover */
    }
</style>

<script>
    const thumbnails = document.querySelectorAll('.thumbnail-container');
    const largeImageView = document.getElementById('largeImageView');
    const largeImage = document.getElementById('largeImage');
    const overlay = document.getElementById('overlay');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const img = this.querySelector('.thumbnail');
            largeImageView.src = img.src; // Lấy src của ảnh
            largeImage.style.display = 'block';
            overlay.style.display = 'block';
        });
    });

    // Hàm để ẩn ảnh lớn và overlay
    function hideLargeImage() {
        largeImage.style.display = 'none';
        overlay.style.display = 'none';
    }

    overlay.addEventListener('click', hideLargeImage);
    largeImage.addEventListener('click', hideLargeImage);
</script>