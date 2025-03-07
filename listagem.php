<?php include 'phpHeader.php'; ?> 
<html class="no-js" lang="">

<?php include 'header.php'; ?> 

<body>
    <!-- Header -->
    <?php include 'navigation.php'; ?> 
    <!-- Header end -->
    <!-- Mensal-->
    <div class="Mensal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="row">
                            <h2>Listagem mensal</h2>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="servico">Servico</label>
                                                <select name="servicoListagemMensal" id="servicoListagemMensal" class="form-control input-lg">
                                                    <option value="Vendas">Vendas</option>
                                                    <option value="ComprasTakeAway">Compras - Produtos Take Away</option>
                                                    <option value="Delivery">Delivery</option>
                                                    <option value="ComprasDelivery">Compras - Produtos Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="mes">Mes</label>
                                                <select id="mesListagemMensal" name="mesListagemMensal" class="form-control input-lg">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="Ano">Ano</label>
                                                <select id="anoListagemMensal" name="anoListagemMensal" class="form-control input-lg">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <div id="tableListagemMensalHTML"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Diario-->
    <div class="Diario">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="row">
                            <h2>Listagem Diario</h2>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <label for="servicoDia">Servico</label>
                                                <select name="servicoDia" id="servicoDia" class="form-control input-lg">
                                                    <option value="VendasDia">Vendas</option>
                                                    <option value="ComprasTakeAwayDia">Compras - Produtos Take Away</option>
                                                    <option value="DeliveryDia">Delivery</option>
                                                    <option value="ComprasDeliveryDia">Compras - Produtos Delivery</option>
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
                                                <input type="date" id="dateDia" name="dateDia" class="form-control input-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <div id="tableListagemDiarioHTML"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <?php include 'footer.php'; ?> 
    <script src="js/tablesDynamics.js"></script>
    <script src="js/dataPopulation.js"></script>
    <script>
        populate30Years("anoListagemMensal");
        populateMonths("mesListagemMensal");
    </script> 
</body>

</html>