@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2" style="background-color: #363636;">
            <div class="dashboard">
                <ion-icon name="tv-outline" style="font-size:40px"></ion-icon>
                <h3>Painel</h3>
            </div>
            <ul class="list-group">
                <a class="list-group-item mt-1 item-painel-norm" href="produtos">
                    <ion-icon name="pricetags-outline" style="font-size:30px"></ion-icon>
                    Produtos
                </a>
                <a class="list-group-item mt-1 item-painel-norm" href="vendas">
                    <ion-icon name="cash-outline" style="font-size:30px"></ion-icon>
                    Vendas
                </a>
                <a class="list-group-item mt-1 item-painel-norm" href="compras">
                    <ion-icon name="cart-outline" style="font-size:30px"></ion-icon>
                    Compras
                </a>
                <a class="list-group-item mt-1 item-painel-norm active" href="clientes">
                    <ion-icon name="people-outline" style="font-size:30px"></ion-icon>
                    Clientes
                </a>
                <a class="list-group-item mt-1 item-painel-norm" href="fabricantes">
                    <ion-icon name="people-outline" style="font-size:30px"></ion-icon>
                    Fabricantes
                </a>

                <button class="list-group-item mt-1 item-painel" data-toggle="collapse" href="#pessoas" role="button" aria-expanded="false" aria-controls="pessoas">
                    Cadastro
                    <ion-icon name="arrow-down-outline" style="font-size:20px"></ion-icon>
                </button>
                <div class="collapse" id="pessoas" href="">
                    <a class="list-group-item mt-1 item-painel-norm" href="addCliente">
                        <ion-icon name="add-outline"></ion-icon>
                        Adcionar Clientes
                    </a>
                    <a class="list-group-item mt-1 item-painel-norm" href="addUsuario">
                        <ion-icon name="add-outline"></ion-icon>
                        Adcionar Usuarios
                    </a>
                    <a class="list-group-item mt-1 item-painel-norm" href="addFabricante">
                        <ion-icon name="add-outline"></ion-icon>
                        Adcionar Fabricante
                    </a>
                </div>

            </ul>
        </div>

        <div class="col-10">
            <div class="filtros mb-3">
                <div>{{$clientes->links()}}</div>
                <h1>Clientes cadastrados</h1>
                <form action="" method="post" class="form-inline">
                    <input type="text" placeholder="Pesquisar clientes" class="form-control-lg">
                    <input type="submit" class="btn btn-dark btn-lg" value="Pesquisar">
                </form>
            </div>
            <table class="table table-striped table-tableleve">
                <thead>
                    <th>Cod</th>
                    <th>Cep</th>
                    <th>Razao</th>
                    <th>cnpj/cpf</th>
                    <th>UF</th>
                    <th>municipio</th>
                    <th>Tel</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Num</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->cep}}</td>
                            <td>{{$cliente->razao_social}}</td>
                            <td>{{$cliente->cnpj}}</td>
                            <td>{{$cliente->estado}}</td>
                            <td>{{$cliente->municipio}}</td>
                            <td>{{$cliente->telefone}}</td>
                            <td>{{$cliente->bairro}}</td>
                            <td>{{$cliente->rua}}</td>
                            <td>{{$cliente->numero}}</td>
                            <td>
                                <button class="btn btn-darkleve" data-id="{{$cliente->id}}" onclick="editarCliente(this)">Editar</button>
                                <button class="btn btn-danger" data-id="{{$cliente->id}}" onclick="excluirCliente(this)">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal fade" role="dialog" id="editarCliente" aria-labelladby="editarClienteLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="editarClienteLabel">Editar Cliente</h1>
                            <button class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-row" id="salvarCliente">
                                <label class="col-form-label">Cep:</label>
                                <div class="col-4 mb-2">
                                    <input type="text" class="form-control" name="cep">
                                </div>
                                
                                <label class="col-form-label">Razao Social:</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Razao Social" name="razao">
                                </div>

                                <label class="col-form-label">CNPJ/CPF:</label>
                                <div class="col-5 mb-2">
                                    <input type="text" class="form-control" placeholder="CNPJ/CPF" name="cnpj">
                                </div>

                                <label class="col-form-label">UF:</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Estado" name="uf">
                                </div>
                                
                                <label class="col-form-label">Municipio:</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Municipio" name="municipio">
                                </div>

                                <label class="col-form-label">Telefone:</label>
                                <div class="col-4 mb-2">
                                    <input type="text" class="form-control" placeholder="Telefone" name="tel">
                                </div>

                                <label class="col-form-label">Bairro:</label>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Bairro" name="bairro">
                                </div>
                                
                                <label class="col-form-label">Rua:</label>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Rua" name="rua">
                                </div>
                                
                                <label class="col-form-label">Numero:</label>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Numero" name="numero">
                                </div>
                                <input type="submit" id="enviarCliente" style="display:none">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-lg" data-dismiss="modal" onclick="salvarCliente()">Salvar</button>
                            <button class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="excluirCliente" aria-labelledby="excluiClienteLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="excluiClienteLabel">Excluir Cliente</h1>
                            <button class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1>VOCÊ TEM CERTEZA QUE QUER EXLCUIR?</h1>
                            <h6>
                                Se Você excluir o cliente Você perderá os dados dele
                            </h6>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-lg" data-dismiss="modal" onclick="excluirClienteTrue()">Excluir</button>
                            <button class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
