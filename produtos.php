<?php include 'phpHeader.php'; ?> 
<html class="no-js" lang="">

<?php include 'header.php'; ?> 
<?php
 include 'methods/DB_getProductName.php'; 
?> 
  <?php include 'methods/CSRF_methods.php'; ?> 

<body>
    <!-- Header -->
    <?php include 'navigation.php'; ?> 
    <!-- Header end -->

    <!-- produtos-->
    <div class="refeicoes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                    <h2>Produtos</h2>

                                    <!-- Modal de criar produtos  -->
                                    <form id="product_create" method="post">
                                        <input type="hidden" id="csrf_tokenCreate" name="csrf_tokenCreate" value="<?php echo generateCsrfTokenCreate(); ?>">
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
                                                        <input type="text" name="nameProduct" id="nameProduct" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Tipo</h2>
                                                        <input type="text" name="typeProduct" id="typeProduct" class="form-control input-lg" placeholder="Tipo">
                                                        <hr>
                                                        <h2>Quantidade</h2>
                                                        <input type="number" name="quantityProduct" id="quantityProduct" class="form-control input-lg" placeholder="Quantidade">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="createProduct" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de actualizar produtos  -->
                                    <form id="product_update" method="post">
                                        <input type="hidden" id="csrf_tokenUpdate" name="csrf_tokenUpdate" value="<?php echo generateCsrfTokenUpdate(); ?>">
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
                                                    <label for="Produto">Produto</label>
                                                        <select name="produtoUpdate" id="produtoUpdate" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowProd))
                                                                foreach($rowProd as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>" data-hidden="<?php echo $rows['nome'];?>" ><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                        <h2>Novo nome</h2>
                                                        <input type="text" name="updateNameProduct" id="updateNameProduct" class="form-control input-lg" placeholder="Nome">
                                                        <hr>
                                                        <h2>Novo Tipo</h2>
                                                        <input type="text" name="updatetypeProduct" id="updatetypeProduct" class="form-control input-lg" placeholder="Tipo">
                                                        <hr>
                                                        <h2>Nova quantidade</h2>
                                                        <input type="number" name="updateQuantyProduct" id="updateQuantyProduct" class="form-control input-lg" placeholder="Quantidade">
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="updateProduct" >Executar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -->
                                    <br>
                                    <hr>
                                    <!-- Modal de apagar produtos  -->
                                    <form id="product_delete" method="post">
                                        <input type="hidden" id="csrf_tokenDelete" name="csrf_tokenDelete" value="<?php echo generateCsrfTokenDelete(); ?>">
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
                                                        <select name="produtoDelete" id="produtoDelete" class="form-control input-lg">
                                                            <?php
                                                            if(!empty($rowProd))
                                                                foreach($rowProd as $rows){ ?> 
                                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['nome'];?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                                                        <button type="submit" class="btn btn-default" value="deleteProduct">Executar</button>
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
                                <?php include 'methods/productTable.php'?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <?php include 'footer.php'; ?>
    <script src="js/OPSproduct.js"></script> 
</body>

</html>