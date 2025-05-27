<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?= URL_ADMIN ?>quan-li-giao-vien">Quản lí giáo viên</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-auto d-flex">
                                    <a href="<?= URL_ADMIN ?>quan-li-giao-vien" class="btn btn-secondary">Quay về</a>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <div class="pt-3">
                                                <div class="sa-symbol sa-symbol--shape--circle" style="--sa-symbol--size:6rem">
                                                    <img src="<?= DEFAULT_AVATAR ?>" width="96" height="96" alt=""/>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <div class="fs-exact-16 fw-medium">Nguyễn Xuân Long</div>
                                                <div class="badge badge-sa-warning mt-5">
                                                    Giáo viên cao cấp
                                                </div>
                                                <div class="fs-exact-13 fw-bold text-muted mt-3">
                                                    15.600 điểm
                                                </div>
                                            </div>
                                            <div class="sa-divider my-5"></div>
                                            <div class="w-100">
                                                <dl class="list-unstyled m-0">
                                                    <dt class="fs-exact-14 fw-medium">Số điện thoại</dt>
                                                    <dd class="fs-exact-13 text-muted mb-0 mt-1">0965 279 041</dd>
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Địa chỉ</dt>
                                                    <dd class="fs-exact-13 text-muted mb-0 mt-1">Thành phố Hồ Chí Minh</dd>
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Ngày sinh</dt>
                                                    <dd class="fs-exact-13 text-muted mb-0 mt-1">31-05-1994</dd>
                                                </dl>
                                                <dl class="list-unstyled m-0 mt-4">
                                                    <dt class="fs-exact-14 fw-medium">Ngày đăng kí</dt>
                                                    <dd class="fs-exact-13 text-muted mb-0 mt-1">13-05-2012</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Chọn tiêu chí</h2>
                                        </div>
                                        <div class="sa-divider"></div>
                                        <form action="" method="post">
                                            <div class="p-5 d-flex gap-3">
                                                <select name="type" class="form-select">
                                                    <option selected disabled >-- Nhấn vào để chọn --</option>
                                                    <option value="1">Sách phục vụ đào tạo</option>
                                                    <option value="2">Đề tài khoa học</option>
                                                    <option value="3">Sáng kiến, chuyên đề khoa học cấp trường</option>
                                                    <option value="4">Bài báo khoa học</option>
                                                    <option value="5">Báo cáo khoa học</option>
                                                    <option value="6">Thành tích dạy giỏi</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Chọn</button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php if($show_history) : ?>
                                    <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Lịch sử hoạt động</h2>
                                            <div class="text-muted fs-exact-14 text-end">5 hoạt động</div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-start">STT</th>
                                                        <th>Tên hoạt động</th>
                                                        <th>Nội dung hoạt động</th>
                                                        <th>Số điểm đạt được</th>
                                                    </tr>
                                                <?php for ($i=1; $i <= 5; $i++) : ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td>Nghiên cứu khoa học</td>
                                                        <td>Những tính chất về định luật bảo toàn năng lượng E=mc2</td>
                                                        <td class="text-center">3</td>
                                                    </tr>
                                                <?php endfor ?>
                                                    <tr>
                                                        <td class="text-start fw-bold" colspan="3">Tổng điểm</td>
                                                        <td class="text-center fw-bold">15</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>