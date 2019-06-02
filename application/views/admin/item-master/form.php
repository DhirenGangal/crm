<div class="content-wrapper">
    <section class="content-header">
        <h1>Item Master</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Item Master</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getMessage(); ?>

        <div class="box box-info">
            <div class="box-header with-border"><h3 class="box-title">Add Item</h3>
                <div class="box-tools">
                    <a href="<?php echo base_url(); ?>admin/item-master/" class="btn btn-sm btn-danger"><i
                                class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="frm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="item_id"
                           value="<?php echo !empty($item['item_id']) ? $item['item_id'] : ''; ?>"/>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Item Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="item_name" required class="form-control"
                                       placeholder="Item Name"
                                       value="<?php echo !empty($item['item_name']) ? $item['item_name'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">HSN/SAC Code <sup class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="hsn_code" required class="form-control"
                                       placeholder="HSN/SAC Code" onkeypress="return isNumber(event)"
                                       value="<?php echo !empty($item['hsn_code']) ? $item['hsn_code'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Item/SKU Code </label>
                            <div class="col-md-7">
                                <input type="text" name="item_code" class="form-control" placeholder="Enter Item Code"
                                       value="<?php echo !empty($item['item_code']) ? $item['item_code'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Tax Rate(%) </label>
                            <div class="col-md-7">
                                <select id="tax_rate" name="gst" class="form-control">
                                    <option value="0">--Select Tax Rate--</option>
                                    <option value="0">0</option>
                                    <option value="0.1">0.1</option>
                                    <option value="0.25">0.25%</option>
                                    <option value="12">12%</option>
                                    <option value="18">18%</option>
                                    <option value="28">28%</option>
                                    <option value="3">3%</option>
                                    <option value="5">5%</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">CESS Amount </label>
                            <div class="col-md-7">
                                <input type="text" name="cess_amnt" class="form-control" placeholder="Enter CESS Amount"
                                       value="<?php echo !empty($item['cess_amnt']) ? $item['cess_amnt'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Purchase Price </label>
                            <div class="col-md-7">
                                <input type="text" name="purchase_price" class="form-control"
                                       placeholder="Purchase Price"
                                       value="<?php echo !empty($item['purchase_price']) ? $item['purchase_price'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Selling Price <sup class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="mrp_price" required class="form-control"
                                       placeholder="Selling Price"
                                       value="<?php echo !empty($item['mrp_price']) ? $item['mrp_price'] : '' ?>"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">UOM</label>
                            <div class="col-md-7">
                                <select id="unit_of_measurement" class="form-control" name="uom">
                                    <option value="">--Select UOM--</option>
                                    <option value="BOU">BOU</option>
                                    <option value="BGS">Bags</option>
                                    <option value="BAL">Bale</option>
                                    <option value="BTL">Bottles</option>
                                    <option value="BOX">Boxes</option>
                                    <option value="BKL">Buckles</option>
                                    <option value="BUN">Bunches</option>
                                    <option value="BDL">Bundles</option>
                                    <option value="CAN">Cans</option>
                                    <option value="CTN">Cartons</option>
                                    <option value="CMS">Centimeter</option>
                                    <option value="CCM">Cubic Centimeter</option>
                                    <option value="CBM">Cubic Meter</option>
                                    <option value="DOZ">Dozen</option>
                                    <option value="DRM">Drums</option>
                                    <option value="GMS">Grams</option>
                                    <option value="GGK">Great Gross</option>
                                    <option value="GRS">Gross</option>
                                    <option value="GYD">Gross Yards</option>
                                    <option value="KGS">Kilograms</option>
                                    <option value="KLR">Kiloliter</option>
                                    <option value="KME">Kilometers</option>
                                    <option value="MTR">Meter</option>
                                    <option value="MTS">Metric Ton</option>
                                    <option value="MLT">Milliliters</option>
                                    <option value="NOS">Numbers</option>
                                    <option value="OTH">Others</option>
                                    <option value="PAC">Packs</option>
                                    <option value="PRS">Pairs</option>
                                    <option value="PCS">Pieces</option>
                                    <option value="QTL">Quintal</option>
                                    <option value="ROL">Rolls</option>
                                    <option value="SET">Sets</option>
                                    <option value="SQF">Square Feet</option>
                                    <option value="SQM">Square Meter</option>
                                    <option value="SQY">Square Yards</option>
                                    <option value="TBS">Tablets</option>
                                    <option value="TGM">Ten Grams</option>
                                    <option value="THD">Thousands</option>
                                    <option value="TON">Tonnes</option>
                                    <option value="TUB">Tubes</option>
                                    <option value="UGS">US Gallons</option>
                                    <option value="UNT">Units</option>
                                    <option value="YDS">Yards</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Discount(%) <sup class="text-danger">*</sup></label>
                            <div class="col-md-7">
                                <input type="text" name="discount" required class="form-control"
                                       placeholder="Discount (%)"
                                       value="<?php echo !empty($item['discount']) ? $item['discount'] : '' ?>"/>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Item Notes</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="description" rows="6"
                                          placeholder="Enter Item description"><?php echo !empty($item['description']) ? $item['description'] : '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7">
                                <button form="frm" type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url() ?>admin/item-master/" class="btn btn-danger">Cancel</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">

                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
