<?php include 'header_admin.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Bảng sản phẩm</h1>
					</div>

				</div>
			</div>
			<!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-20" style="width: 100%;">
						<!-- general form elements -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Nhập sản phẩm mới</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form method="post"
					action="${pageContext.request.contextPath }/admin/flowercreate">
								<div class="card-body">
									<div class="form-group">
										<label for="exampleInputEmail1">Tên sản phẩm</label> <input
											type="text" class="form-control" id="ProductName" name="ProductName"
											placeholder="Nhập sản phẩm">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Giá</label> <input
											type="text" class="form-control" id="Price" name="Price"
											placeholder="Nhập giá">
									</div>
                                    <div class="form-group">
										<label for="exampleInputPassword1">Series</label> <input
											type="text" class="form-control" id="Series" name="Series"
											placeholder="Nhập Series của sản phẩm">
									</div>
                                    <div class="form-group">
										<label for="exampleInputPassword1">Hãng sản xuất</label> <input
											type="text" class="form-control" id="Brand" name="Brand"
											placeholder="Nhập hãng sản xuất">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Mô tả</label> <input
											type="text" class="form-control" id="Note" name="Note"
											placeholder="Nhập mô tả cho sản phẩm">
									</div>
                                    <div class="form-group">
										<label for="exampleInputPassword1">Ngày phát hành</label> <input
											type="text" class="form-control" id="DateRelease" name="DateRelease"
											placeholder="Nhập mô tả cho sản phẩm">
									</div>
                                    <div class="form-group">
										<label for="exampleInputPassword1">Số lượng nhập</label> <input
											type="text" class="form-control" id="Stock" name="Stock"
											placeholder="Nhập số lượng cần thêm vào">
									</div>
									<div class="form-group">
										<label for="exampleInputFile">Hình ảnh</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="fileupload">
												<label class="custom-file-label" for="exampleInputFile">Chọn
													file để upload</label>
											</div>

										</div>
										<img style="margin: 1% 0 1% 30%;"
											src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png"
											width="400vw" height="200vh" id="image" />
											<input style="display:none;" type="text" class="form-control" id="geturlcloud" name="geturlcloud">
									
									</div>

								</div>
								<!-- /.card-body -->

								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Thêm hoa
										mới</button>
								</div>
							</form>
						</div>
						<!-- /.card -->

					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
<?php include 'footer_admin.php'; ?>