<?php
 include 'methods/DB_getProductName.php'; 
?> 
<?php
 include 'methods/DB_getMealName.php'; 
?> 
<?php
 include 'methods/DB_getDeliverySupplierName.php'; 
?> 
<?php
 include 'methods/DB_getDeliveryClientName.php'; 
?>
<?php
 include 'methods/DB_getDeliveryProductName.php'; 
?>  
<?php
 include 'methods/DB_getDeliveryInfo.php'; 
?>  
<?php
 include 'methods/DB_getDeliveryMenuStatusBar.php'; 
?> 
  <?php include 'methods/CSRF_methods.php'; ?> 
<?php include 'phpHeader.php'; ?> 
<html class="no-js" lang="">

<?php include 'header.php'; ?> 

<body>
    <!-- Header -->
    <?php include 'navigation.php'; ?> 
    <!-- Header end -->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                            if(!empty($rowMonthSales))
                                foreach($rowMonthSales as $rows){ ?> 
                                    <h2><span class="counter"><?php echo $rows['receitaMensal']; ?></span> MZN </h2> 
                            <?php } ?>
                            <p>Deliverys do mes actual</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                            if(!empty($rowTotalSales))
                                foreach($rowTotalSales as $rows){ ?> 
                                    <h2><span class="counter"><?php echo $rows['receita']; ?></span> MZN </h2> 
                            <?php } ?>
                            <p>Total de vendas</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                            if(!empty($rowMonthExpenses))
                                foreach($rowMonthExpenses as $rows){ ?> 
                                    <h2><span class="counter"><?php echo $rows['gastosMensal']; ?></span> MZN </h2> 
                            <?php } ?>
                            <p>Gastos do mes actual</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                            if(!empty($rowMonthPROFITS))
                                foreach($rowMonthPROFITS as $rows){ ?> 
                                    <h2><span class="counter"><?php echo $rows['lucros']; ?></span> MZN </h2> 
                            <?php } ?>
                            <p>Lucro mes actual</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <!-- Deliverys-->
    <div class="vendas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Deliverys</h2>
                            </div>
                            <input type="hidden" id="csrf_tokenDeleteDelivery" name="csrf_tokenDeleteDelivery" value="<?php echo generateCsrfTokenDeleteDelivery(); ?>">
                            </div>
                                <form id="delivery_addList"> 
                                    <div class="row">
                                            <input type="hidden" id="csrf_tokenCreateDelivery" name="csrf_tokenCreateDelivery" value="<?php echo generateCsrfTokenCreateDelivery(); ?>">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="clienteVendas">Cliente</label>
                                                            <select name="clienteVendas" id="clienteVendas" class="form-control input-lg" required>
                                                                <?php
                                                                if(!empty($rowDevCLI))
                                                                    foreach($rowDevCLI as $rows){ ?> 
                                                                    <option value="<?php echo $rows['id']; ?>" data-hiddenSalesClient="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="produtoVendas">Produto</label>
                                                            <select name="produtoVendas" id="produtoVendas" class="form-control input-lg" required>
                                                                <?php
                                                                if(!empty($rowDelPro))
                                                                    foreach($rowDelPro as $rows){ ?> 
                                                                    <option value="<?php echo $rows['id']; ?>" data-hiddenSalesProduct="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="dateVenda">Data de venda</label>
                                                            <input type="date" name="dateVenda" id="dateVenda" class="form-control input-lg"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="quantidadeVenda">Quantidade</label>
                                                            <input type="number" name="quantidadeVenda" id="quantidadeVenda" class="form-control input-lg" placeholder="Quantidade" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="precoVenda">Preco actual</label>
                                                            <input type="number" name="precoVenda" id="precoVenda" class="form-control input-lg" placeholder="Preco Actual" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="curved-inner-pro">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type='button' class="btn btn-primary notika-btn-primary" id="Criar-ListaDelivery">Adicionar lista</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type='button' class="btn btn-danger notika-btn-danger" id="Apagar-ListaDelivery">Remover lista</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="curved-inner-pro">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type="button" id="Executar-createDelivery" class="btn btn-success notika-btn-success">Vender</button>
                                        </div>
                                    </div>
                                    <!-- Modal de apagar vendas existentes -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type="button" data-toggle="modal" data-target="#myModalDeleteDelivery"  class="btn btn-danger notika-btn-danger">Apagar</button>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModalDeleteDelivery" role="dialog">
                                        <div class="modal-dialog modal-large">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Ano</h2>
                                                    <select id="yearDelivery" name="yearDelivery"  class="form-control"></select>  
                                                    <hr>
                                                    <h2>Mes</h2>
                                                    <select id="monthDelivery" name="monthDelivery"  class="form-control"></select> 
                                                    <hr>
                                                    <div class="data-table-list">
                                                        <div class="table-responsive">
                                                            <div id="tableDeleteDeliveryHTML"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                <button type="button" id="Executar-deleteDelivery" class="btn btn-default">Executar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->

                                </div>
                            </div>
                            <div class="row">
                                <div id="listagemDelivery"> </div>
                            </div>
                        <hr>
                        <div class="past-day-statis">
                            <h2>Listagem diario</h2>
                        </div>
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/dailyDeliveryTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <!-- Compras -->
    <div class="compras">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Compras - produtos de delivery</h2>
                            </div>
                        </div>
                        <form>
                            <input type="hidden" id="csrf_tokenCreateDeliveryPurchase" name="csrf_tokenCreateDeliveryPurchase" value="<?php echo generateCsrfTokenCreateDeliveryPurchase(); ?>">
                            <input type="hidden" id="csrf_tokenDeleteDeliveryPurchase" name="csrf_tokenDeleteDeliveryPurchase" value="<?php echo generateCsrfTokenDeleteDeliveryPurchase(); ?>">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="produto">Produto</label>
                                                <select name="produtoPurchases" id="produtoPurchases" class="form-control input-lg">
                                                    <?php
                                                    if(!empty($rowDelPro))
                                                        foreach($rowDelPro as $rows){ ?> 
                                                        <option value="<?php echo $rows['id']; ?>" data-hiddenDeliveryPurchaseProduct="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="produto">Fornecedor</label>
                                                <select name="supplierPurchases" id="supplierPurchases" class="form-control input-lg">
                                                    <?php
                                                    if(!empty($rowDevSup))
                                                        foreach($rowDevSup as $rows){ ?> 
                                                        <option value="<?php echo $rows['id']; ?>" data-hiddenDeliveryPurchaseSupplier="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="">Data</label>
                                                <input type="date" name="datePurchases" id="datePurchases" class="form-control input-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="number" name="quantityPurchases" id="quantityPurchases" class="form-control input-lg" placeholder="Quantidade">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="number" name="pricePurchases" id="pricePurchases" class="form-control input-lg" placeholder="Preco">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="curved-inner-pro">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type='button' class="btn btn-primary notika-btn-primary" id="Criar-ListaPurchasesDelivery">Adicionar lista</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type='button' class="btn btn-danger notika-btn-danger" id="Apagar-ListaPurchasesDelivery">Remover lista</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="curved-inner-pro">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                        <button type="button" id="Executar-createPurchaseDelivery" class="btn btn-success notika-btn-success">Comprar</button>
                                        </div>
                                    </div>
                                    <!-- Modal de apagar compras existentes -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type="button" data-toggle="modal" data-target="#myModalDeletePurchases" class="btn btn-danger notika-btn-danger">Apagar</button>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModalDeletePurchases" role="dialog">
                                        <div class="modal-dialog modal-large">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Ano</h2>
                                                    <select id="yearPurchasesDelivery" name="yearPurchasesDelivery"  class="form-control"></select>  
                                                    <hr>
                                                    <h2>Mes</h2>
                                                    <select id="monthPurchasesDelivery" name="monthPurchasesDelivery"  class="form-control"></select>
                                                    <hr>
                                                    <div class="data-table-list">
                                                        <div class="table-responsive">
                                                            <div id="tableDeletePurchasesDeliveryHTML"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                    <button type="button" id="Executar-deleteDeliveryPurchases" class="btn btn-default">Executar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->
                                    
                                </div>
                            </div>
                            <div class="row">
                                <p id="listagemComprasDelivery"> </p>
                            </div>
                        </form>
                        <hr>
                        <div class="past-day-statis">
                            <h2>Listagem diario</h2>
                        </div>
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/dailyPurchasesDeliveryTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-->

    <!-- Produtos-->
    <div class="produtos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                    <h2>Produtos de delivery</h2>

                                    <!-- Modal de criar produtos  -->
                                    <form id="productD_create" method="post">
                                        <input type="hidden" id="csrf_tokenCreateDeliveryProduct" name="csrf_tokenCreateDeliveryProduct" value="<?php echo generateCsrfTokenCreateDeliveryProduct(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalCreateDeliveryProduct" class="btn btn-success notika-btn-success">Criar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalCreateDeliveryProduct" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Nome</h2>
                                                        <input type="text" name="nameProductDel" id="nameProductDel" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Tipo</h2>
                                                        <input type="text" name="typeProductDel" id="typeProductDel" class="form-control input-lg" placeholder="Tipo">
                                                        <hr>
                                                        <h2>Quantidade</h2>
                                                        <input type="number" name="quantityProductDel" id="quantityProductDel" class="form-control input-lg" placeholder="Quantidade">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="createDeliveryProduct" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de actualizar produtos  -->
                                    <form id="productD_update" method="post">
                                        <input type="hidden" id="csrf_tokenUpdateDeliveryProduct" name="csrf_tokenUpdateDeliveryProduct" value="<?php echo generateCsrfTokenUpdateDeliveryProduct(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalUpdateDeliveryProdutc"  class="btn btn-primary notika-btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalUpdateDeliveryProdutc" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Produto">Produto</label>
                                                        <select name="DeliveryProductUpdate" id="DeliveryProductUpdate" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowDelPro))
                                                                foreach($rowDelPro as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>" data-hidden="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                        <h2>Nome</h2>
                                                        <input type="text" name="updatenameProductDel" id="updatenameProductDel" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Tipo</h2>
                                                        <input type="text" name="updatetypeProductDel" id="updatetypeProductDel" class="form-control input-lg" placeholder="Tipo">
                                                        <hr>
                                                        <h2>Quantidade</h2>
                                                        <input type="number" name="updatequantityProductDel" id="updatequantityProductDel" class="form-control input-lg" placeholder="Quantidade">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="updateDeliveryProduct" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de apagar produtos  -->
                                    <form id="productD_delete" method="post">
                                        <input type="hidden" id="csrf_tokenDeleteDeliveryProduct" name="csrf_tokenDeleteDeliveryProduct" value="<?php echo generateCsrfTokenDeleteDeliveryProduct(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalDeleteProductDel"  class="btn btn-danger notika-btn-danger">Apagar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalDeleteProductDel" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="DeliveryProductDelete">Produto</label>
                                                        <select name="DeliveryProductDelete" id="DeliveryProductDelete" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowDelPro))
                                                                foreach($rowDelPro as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="deleteDeliveryProduct">Executar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                </div>
                            </div>
                            <hr>
                        
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/productDeliveryTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End-->
    <!-- Fornecedores-->
    <div class="fornecedor">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                    <h2>Fornecedores</h2>

                                    <!-- Modal de criar fornecedor  -->
                                    <form id="supplier_create" method="post">
                                        <input type="hidden" id="csrf_tokenCreateDeliverySupplier" name="csrf_tokenCreateDeliverySupplier" value="<?php echo generateCsrfTokenCreateDeliverySupplier(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalCreateDeliverySupplier" class="btn btn-success notika-btn-success">Criar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalCreateDeliverySupplier" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Nome</h2>
                                                        <input type="text" name="nameSupplier" id="nameSupplier" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Localizacao</h2>
                                                        <input type="text" name="locationSupplier" id="locationSupplier" class="form-control input-lg" placeholder="Localizacao">
                                                        <hr>
                                                        <h2>Contacto</h2>
                                                        <input type="text" name="contactoSupplier" id="contactoSupplier" class="form-control input-lg" placeholder="Numero de telefone">
                                                        <hr>
                                                        <h2>mail</h2>
                                                        <input type="email" name="emailSupplier" id="emailSupplier" class="form-control input-lg" placeholder="Email">
                                                        <hr>
                                                        <h2>Credito</h2>
                                                        <input type="number" name="creditSupplier" id="creditSupplier" class="form-control input-lg" placeholder="Credito">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="createSupplier" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de actualizar refeicoes  -->
                                    <form id="supplier_Update" method="post">
                                        <input type="hidden" id="csrf_tokenUpdateDeliverySupplier" name="csrf_tokenUpdateDeliverySupplier" value="<?php echo generateCsrfTokenUpdateDeliverySupplier(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalUpdateDeliverySupplier"  class="btn btn-primary notika-btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalUpdateDeliverySupplier" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Refeicao">Fornecedor</label>
                                                        <select name="supplierUpdate" id="supplierUpdate" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowDevSup))
                                                                foreach($rowDevSup as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>" data-hidden="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                        <hr>
                                                        <h2>Nome</h2>
                                                        <input type="text" name="updatenameSupplier" id="updatenameSupplier" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Localizacao</h2>
                                                        <input type="text" name="updatelocationSupplier" id="updatelocationSupplier" class="form-control input-lg" placeholder="Localizacao">
                                                        <hr>
                                                        <h2>Contacto</h2>
                                                        <input type="text" name="updatecontactoSupplier" id="updatecontactoSupplier" class="form-control input-lg" placeholder="Numero de telefone">
                                                        <hr>
                                                        <h2>mail</h2>
                                                        <input type="email" name="updateemailSupplier" id="updateemailSupplier" class="form-control input-lg" placeholder="Email">
                                                        <hr>
                                                        <h2>Credito</h2>
                                                        <input type="number" name="updatecreditSupplier" id="updatecreditSupplier" class="form-control input-lg" placeholder="Credito">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="updateSupplier" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de apagar refeicoes  -->
                                    <form id="supplier_delete" method="post">
                                        <input type="hidden" id="csrf_tokenDeleteDeliverySupplier" name="csrf_tokenDeleteDeliverySupplier" value="<?php echo generateCsrfTokenDeleteDeliverySupplier(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalDeleteDeliverySupplier"  class="btn btn-danger notika-btn-danger">Apagar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalDeleteDeliverySupplier" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Refeicao">Fornecedor</label>
                                                        <select name="supplierDelete" id="supplierDelete" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowDevSup))
                                                                foreach($rowDevSup as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="deleteSupplier">Executar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                </div>
                            </div>
                            <hr>
                        
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/supplierTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- clientes-->
    <div class="cliente">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                    <h2>Clientes</h2>

                                    <!-- Modal de criar clientes  -->
                                    <form id="client_create" method="post">
                                        <input type="hidden" id="csrf_tokenCreateDeliveryClient" name="csrf_tokenCreateDeliveryClient" value="<?php echo generateCsrfTokenCreateDeliveryClient(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalCreateClient" class="btn btn-success notika-btn-success">Criar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalCreateClient" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Nome</h2>
                                                        <input type="text" name="nameClient" id="nameClient" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Mail</h2>
                                                        <input type="email" name="mailClient" id="mailClient" class="form-control input-lg" placeholder="Mail">
                                                        <hr>
                                                        <h2>Localizacao</h2>
                                                        <input type="text" name="locationClient" id="locationClient" class="form-control input-lg" placeholder="Localizacao">
                                                        <hr>
                                                        <h2>Contacto</h2>
                                                        <input type="text" name="contactClient" id="contactClient" class="form-control input-lg" placeholder="Contacto">
                                                        <hr>
                                                        <h2>Tipo</h2>
                                                        <select name="typeClient" id="typeClient" class="form-control input-lg" >
                                                            <option value="Individual">Individual</option>
                                                            <option value="Empresa privada">Empresa privada</option>
                                                            <option value="Governo">Governo</option>
                                                            <option value="ONG">ONG</option>
                                                        </select>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="createClient" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de actualizar refeicoes  -->
                                    <form id="client_update" method="post">
                                        <input type="hidden" id="csrf_tokenUpdateDeliveryClient" name="csrf_tokenUpdateDeliveryClient" value="<?php echo generateCsrfTokenUpdateDeliveryClient(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalUpdateClient"  class="btn btn-primary notika-btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalUpdateClient" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Refeicao">Cliente</label>
                                                        <select name="clientUpdate" id="clientUpdate" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowDevCLI))
                                                                foreach($rowDevCLI as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>" data-hidden="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                        <hr>
                                                        <h2>Nome</h2>
                                                        <input type="text" name="nameupdateClient" id="nameupdateClient" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Mail</h2>
                                                        <input type="email" name="mailupdateClient" id="mailupdateClient" class="form-control input-lg" placeholder="Mail">
                                                        <hr>
                                                        <h2>Localizacao</h2>
                                                        <input type="text" name="locationupdateClient" id="locationupdateClient" class="form-control input-lg" placeholder="Localizacao">
                                                        <hr>
                                                        <h2>Contacto</h2>
                                                        <input type="text" name="contactupdateClient" id="contactupdateClient" class="form-control input-lg" placeholder="Contacto">
                                                        <hr>
                                                        <h2>Tipo</h2>
                                                        <select name="typeupdateClient" id="typeupdateClient" class="form-control input-lg" >
                                                            <option value="Individual">Individual</option>
                                                            <option value="Empresa privada">Empresa privada</option>
                                                            <option value="Governo">Governo</option>
                                                            <option value="ONG">ONG</option>
                                                        </select>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="updateClient" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de apagar refeicoes  -->
                                    <form id="client_delete" method="post">
                                        <input type="hidden" id="csrf_tokenDeleteDeliveryClient" name="csrf_tokenDeleteDeliveryClient" value="<?php echo generateCsrfTokenDeleteDeliveryClient(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalDeleteClient"  class="btn btn-danger notika-btn-danger">Apagar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalDeleteClient" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Cliente">Cliente</label>
                                                        <select name="clienteDelete" id="clienteDelete" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowDevCLI))
                                                                foreach($rowDevCLI as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="deleteClient">Executar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                </div>
                            </div>
                            <hr>
                        
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/clientTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <?php include 'footer.php'; ?>
    <script src="js/DeliverySupplier_OPS.js"></script>
    <script src="js/DeliveryPurchases_OPS.js"></script>
    <script src="js/DeliveryProduct_OPS.js"></script>
    <script src="js/DeliveryClients_OPS.js"></script>
    <script src="js/Delivery_OPS.js"></script>
    <script src="js/dataPopulation.js"></script>
    <script src="js/tablesDynamics.js"></script>
    <script>
        populate30Years("yearDelivery");
        populateMonths("monthDelivery");

        populate30Years("yearPurchasesDelivery");
        populateMonths("monthPurchasesDelivery");
    </script> 
</body>

</html>