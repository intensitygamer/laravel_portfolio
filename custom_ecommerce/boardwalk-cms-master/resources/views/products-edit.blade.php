@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/uniform.css" />
    <link rel="stylesheet" href="/css/select2.css" />
    <link rel="stylesheet" href="/css/matrix-style.css" />
    <link rel="stylesheet" href="/css/matrix-media.css" />
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Products</a></div>
        <h1>Edit Product</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
										<h5>Category</h5>
								</div>
								<div class="widget-content nopadding">
									<form action="#" method="get" class="form-horizontal">
										<div class="control-group">
												<label class="control-label">Categories :</label>
												<div class="controls">
													<span class="label label-success padding-7">Pants</span>
													<span class="label label-success padding-7">Jeggings</span>
												</div>
										</div>
										<div class="control-group">
												<label class="control-label">Category :</label>
												<div class="controls">
													<select>
														<option selected>Men > Pants</option>
														<option>Women > Jeggings</option>
														<option>Kids > Boys > Pants</option>
													</select>
												</div>
										</div>
										<div class="form-actions">
												<button type="submit" class="btn btn-success">Add</button>
										</div>
									</form>
								</div>
						</div>
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Product</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Category :</label>
                            <div class="controls">
															<select>
																<option selected>Men</option>
																<option>Women</option>
																<option>Kids</option>
															</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">SKU :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="SKU" value="CK023"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Name :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Name" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description :</label>
                            <div class="controls">
                                <textarea class="span11" ></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Brand :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Brand" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Collection :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Collection" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Designer :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Designer" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Model :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Model" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Price :</label>
                            <div class="controls">
                                <input type="number" class="span11" placeholder="Price" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Status :</label>
                            <div class="controls">
                                <input type="text" class="span11" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Downpayment :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Interset %"/>
																<label>
																	<input type="radio" name="radios" />
																	yes
																</label>
																<label>
																	<input type="radio" name="radios" />
																	no
																</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Free Shipping :</label>
														<div class="controls">
															<select multiple >
																<option selected>Region 1</option>
																<option>Region 2</option>
																<option>Region 3</option>
																<option>Region 4</option>
																<option>Region 5</option>
																<option>Region 6</option>
															</select>
														</div>
                            <div class="controls">
															<label>
																<input type="radio" name="radios" />
																yes
															</label>
															<label>
																<input type="radio" name="radios" />
																no
															</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">New Arrival</label>
														<div class="controls">
															<label>
																<input type="radio" name="radios" />
																yes
															</label>
															<label>
																<input type="radio" name="radios" />
																no
															</label>
                            </div>
                        </div>
												<div class="control-group">
														<label class="control-label">Uploaded</label>
														<div class="controls">
															<img src="http://boardwalk.com.ph/BWAppMedia/onlineshopadmin/ProductImage/thumbnail/HALLIWELL_BLACK_1.jpg"/>
															<img src="http://boardwalk.com.ph/BWAppMedia/onlineshopadmin/ProductImage/thumbnail/HALLIWELL_BLACK_2.jpg"/>
															<img src="http://boardwalk.com.ph/BWAppMedia/onlineshopadmin/ProductImage/thumbnail/HALLIWELL_BLACK_3.jpg"/>
                            </div>
												</div>
                        <div class="control-group">
                            <label class="control-label">Pictures :</label>
                            <div class="controls">
                                <input type="file" class="span11" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Product Attribute</h5> <a href="products-create" class="btn btn-mini btn-success" style="margin-top:7px">+</a>
                </div>
                <div class="widget-content nopadding">
                    <form action="#" method="get" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Color :</label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Color" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" style="padding-top:10px"><input type="text" class="span11" placeholder="Attribute" /></label>
                            <div class="controls">
                                <input type="text" class="span11" placeholder="Attribute Value" />
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery.uniform.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/matrix.js"></script>
    <script src="/js/matrix.tables.js"></script>
@endsection
