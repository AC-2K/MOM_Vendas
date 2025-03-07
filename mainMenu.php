<?php
 include 'methods/DB_getProductName.php'; 
?> 
<?php
 include 'methods/DB_getMealName.php'; 
?> 
<?php
 include 'methods/DB_getMainMenuStatusBar.php'; 
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
                            <p>Vendas do mes actual</p>
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
    <!-- Vendas-->
    <div class="vendas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Vendas</h2>
                            </div>
                            <input type="hidden" id="csrf_tokenDeleteSales" name="csrf_tokenDeleteSales" value="<?php echo generateCsrfTokenDeleteSales(); ?>">
                            </div>
                                <form id="sales_addList"> 
                                    <div class="row">
                                            <input type="hidden" id="csrf_tokenCreateSales" name="csrf_tokenCreateSales" value="<?php echo generateCsrfTokenCreateSales(); ?>">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="Refeicao">Refeicao</label>
                                                            <select name="RefeicaoSales" id="RefeicaoSales" class="form-control input-lg" required>
                                                                <?php
                                                                if(!empty($rowMeal))
                                                                    foreach($rowMeal as $rows){ ?> 
                                                                    <option value="<?php echo $rows['id']; ?>" data-hiddenSales="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
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
                                                            <label for="SalesQuantidade">Quantidade</label>
                                                            <input type="number" name="SalesQuantidade" id="SalesQuantidade" class="form-control input-lg" placeholder="Quantidade" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <label for="SalesDate">Data de venda</label>
                                                            <input type="date" name="SalesDate" id="SalesDate" class="form-control input-lg"  required>
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
                                                <button type='button' class="btn btn-primary notika-btn-primary" id="Criar-ListaSales">Adicionar lista</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type='button' class="btn btn-danger notika-btn-danger" id="Apagar-ListaSales">Remover lista</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="curved-inner-pro">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type="button" id="Executar-createSales" class="btn btn-success notika-btn-success">Vender</button>
                                        </div>
                                    </div>
                                    <!-- Modal de apagar vendas existentes -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type="button" data-toggle="modal" data-target="#myModalDeleteVendas"  class="btn btn-danger notika-btn-danger">Apagar</button>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModalDeleteVendas" role="dialog">
                                        <div class="modal-dialog modal-large">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Ano</h2>
                                                    <select id="yearSales" name="yearSales"  class="form-control"></select>  
                                                    <hr>
                                                    <h2>Mes</h2>
                                                    <select id="monthSales" name="monthSales"  class="form-control"></select> 
                                                    <hr>
                                                    <div class="data-table-list">
                                                        <div class="table-responsive">
                                                            <div id="tableDeleteSalesHTML"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                <button type="button" id="Executar-deleteSales" class="btn btn-default">Executar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->

                                </div>
                            </div>
                            <div class="row">
                                <div id="listagemVendas"> </div>
                            </div>
                        <hr>
                        <div class="past-day-statis">
                            <h2>Listagem diario</h2>
                        </div>
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/dailySalesTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <!-- Compras-->
    <div class="compras">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Compras</h2>
                            </div>
                        </div>
                        <form>
                            <input type="hidden" id="csrf_tokenCreatePurchase" name="csrf_tokenCreatePurchase" value="<?php echo generateCsrfTokenCreatePurchase(); ?>">
                            <input type="hidden" id="csrf_tokenDeletePurchase" name="csrf_tokenDeletePurchase" value="<?php echo generateCsrfTokenDeletePurchase(); ?>">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="produto">Produto</label>
                                                <select name="produtoPurchases" id="produtoPurchases" class="form-control input-lg">
                                                    <?php
                                                    if(!empty($rowProd))
                                                        foreach($rowProd as $rows){ ?> 
                                                        <option value="<?php echo $rows['id']; ?>" data-hiddenPurchase="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
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
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" name="providerPurchases" id="providerPurchases" class="form-control input-lg" placeholder="Fornecedor">
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
                                            <button type='button' class="btn btn-primary notika-btn-primary" id="Criar-ListaPurchases">Adicionar lista</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type='button' class="btn btn-danger notika-btn-danger" id="Apagar-ListaPurchases">Remover lista</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="curved-inner-pro">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                        <button type="button" id="Executar-createPurchase" class="btn btn-success notika-btn-success">Comprar</button>
                                        </div>
                                    </div>
                                    <!-- Modal de apagar compras existentes -->
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-example-int">
                                            <button type="button" data-toggle="modal" data-target="#myModalDeletePurchases"  class="btn btn-danger notika-btn-danger">Apagar</button>
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
                                                    <select id="yearPurchases" name="yearPurchases"  class="form-control"></select>  
                                                    <hr>
                                                    <h2>Mes</h2>
                                                    <select id="monthPurchases" name="monthPurchases"  class="form-control"></select>
                                                    <hr>
                                                    <div class="data-table-list">
                                                        <div class="table-responsive">
                                                            <div id="tableDeletePurchasesHTML"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                    <button type="button" id="Executar-deletePurchases" class="btn btn-default">Executar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- -->
                                    
                                </div>
                            </div>
                            <div class="row">
                                <p id="listagemCompras"> </p>
                            </div>
                        </form>
                        <hr>
                        <div class="past-day-statis">
                            <h2>Listagem diario</h2>
                        </div>
                        <div class="data-table-list">
                            <div class="table-responsive">
                                <?php include 'methods/dailyPurchasesTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End compras-->

    <!-- Refeicoes-->
    <div class="refeicoes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                    <h2>Refeicoes</h2>

                                    <!-- Modal de criar refeicoes  -->
                                    <form id="meal_create" method="post">
                                        <input type="hidden" id="csrf_tokenCreateMeal" name="csrf_tokenCreateMeal" value="<?php echo generateCsrfTokenCreateMeal(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalCreateMeal" class="btn btn-success notika-btn-success">Criar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalCreateMeal" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>Nome</h2>
                                                        <input type="text" name="nameMeal" id="nameMeal" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Preco</h2>
                                                        <input type="number" name="quantityMeal" id="quantityMeal" class="form-control input-lg" placeholder="Preco">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="createMeal" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de actualizar refeicoes  -->
                                    <form id="meal_update" method="post">
                                        <input type="hidden" id="csrf_tokenUpdateMeal" name="csrf_tokenUpdateMeal" value="<?php echo generateCsrfTokenUpdateMeal(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalUpdateMeal"  class="btn btn-primary notika-btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalUpdateMeal" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Refeicao">Refeicao</label>
                                                        <select name="RefeicaoUpdate" id="RefeicaoUpdate" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowMeal))
                                                                foreach($rowMeal as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>" data-hidden="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                        <h2>Novo nome</h2>
                                                        <input type="text" name="updateNameMeal" id="updateNameMeal" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Novo preco</h2>
                                                        <input type="number" name="updatePriceMeal" id="updatePriceMeal" class="form-control input-lg" placeholder="Preco">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="updateMeal" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de apagar refeicoes  -->
                                    <form id="meal_delete" method="post">
                                        <input type="hidden" id="csrf_tokenDeleteMeal" name="csrf_tokenDeleteMeal" value="<?php echo generateCsrfTokenDeleteMeal(); ?>">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-example-int">
                                                <button type="button" data-toggle="modal" data-target="#myModalDeleteMeal"  class="btn btn-danger notika-btn-danger">Apagar</button>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="myModalDeleteMeal" role="dialog">
                                            <div class="modal-dialog modal-large">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="Refeicao">Refeicao</label>
                                                        <select name="RefeicaoDelete" id="RefeicaoDelete" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowMeal))
                                                                foreach($rowMeal as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="deleteMeal">Executar</button>
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
                                <?php include 'methods/mealTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <?php include 'footer.php'; ?>
    <script src="js/OPSmeal.js"></script>
    <script src="js/OPSpurchase.js"></script>
    <script src="js/OPSsale.js"></script>
    <script src="js/dataPopulation.js"></script>
    <script src="js/tablesDynamics.js"></script>
    <script>
        populate30Years("yearSales");
        populateMonths("monthSales");

        populate30Years("yearPurchases");
        populateMonths("monthPurchases");
    </script> 
</body>

</html>