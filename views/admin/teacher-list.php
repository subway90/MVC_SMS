<style>
    .modal-backdrop {
        z-index: 1049;
    }
    .modal {
        z-index: 1050;
    }
    .datepicker {
        z-index: 1051;
    }
</style>
 
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
                        <button data-bs-target="#addTeacher" data-bs-toggle="modal" class="btn btn-primary shadow"><i class="fa fas fa-plus me-2"></i>Thêm giáo viên</button>
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
                            <th class="min-w-10x">Địa chỉ</th>
                            <th class="min-w-5x text-end" data-orderable="false">Hành động</th>
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
                        for ($i=1; $i <= 100; $i++) :
                            $order_role = rand(0,2);
                            $order_address = rand(0,51);
                    ?>
                        <tr class="align-middle">
                            <td class="small">
                                <?= $i ?>
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
                                Số nhà <?= mt_rand(1,99) . ', Hẻm ' . mt_rand(1,99) . ', Phường ' . mt_rand(1,15). ', Quận ' . mt_rand(1,12). ', ' . $arr_address[$order_address] ?>
                            </td>
                            <td class="small">
                                <div class="d-flex justify-content-end gap-3">
                                    <a href="<?= URL_ADMIN ?>chi-tiet-giao-vien" class="btn btn-sm btn-primary shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-warning shadow small d-flex align-items-center gap-3" data-bs-target="#editTeacher" data-bs-toggle="modal">
                                        <i class="fa fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-trash"></i>
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


<div class="modal fade" id="editTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
            <div class="modal-body row px-5">
                <div class="col-12 d-flex align-items-center mb-5">
                    <img width="50" class="rounded-circle" src="<?= DEFAULT_AVATAR ?>" alt="">
                    <div class="ms-5">
                        <div class="fw-bold fs-5">
                            Nguyễn Văn A
                        </div>
                        <div class="small">
                            <div class="badge badge-sa-warning">
                                Giáo viên cao cấp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Họ và tên</label>
                    <input name="name" value="Nguyễn Văn A" type="text" class="form-control" id="name" placeholder="input">
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Số điện thoại</label>
                    <input name="name" value="0965279041" type="text" class="form-control" id="name" placeholder="input">
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Ngày sinh</label>
                    <input name="duration_time" value="31-05-2004" type="text" 
                        class="form-control datepicker-here" 
                        data-toggle-selected="false" 
                        placeholder="Nhấn vào để chọn" 
                        data-auto-close="true" 
                        data-language="en"
                        data-date-format="dd-mm-yyyy"
                        data-first-day="1" 
                        aria-label="Datepicker" />
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Địa chỉ</label>
                    <input name="name" value="102 Tân Thới Nhất 01, Quận 12, Hồ Chí Minh" type="text" class="form-control" id="name" placeholder="input">
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

<div class="modal fade" id="addTeacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm giáo viên</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
            <div class="modal-body row px-5">
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Họ và tên</label>
                    <input name="name" value="" type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Số điện thoại</label>
                    <input name="name" value="" type="text" class="form-control" id="name" placeholder="Nhập số điện thoại">
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Ngày sinh</label>
                    <input name="duration_time" value="" type="text" 
                        class="form-control datepicker-here" 
                        data-toggle-selected="false" 
                        placeholder="Nhấn vào để chọn" 
                        data-auto-close="true" 
                        data-language="en"
                        data-date-format="dd-mm-yyyy"
                        data-first-day="1" 
                        aria-label="Datepicker" />
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="name">Địa chỉ</label>
                    <input name="name" value="" type="text" class="form-control" id="name" placeholder="Nhập địa chỉ">
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