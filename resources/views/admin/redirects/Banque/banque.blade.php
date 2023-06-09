@extends('admin.layouts.template')

@section('page-title')
Banque | Log Dist Du Nord
@endsection

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Banque</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Log Dist Du Nord</a></li>
                            <li class="breadcrumb-item active">Banque</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex mb-3 justify-content-end">
            <button type="button" class="btn btn-warning fw-bold text-white"  data-bs-toggle="modal" onclick="changeBtn()" data-bs-target=".magazinierModal">Ajouter un Banque</button>
        </div>


        {{-- <form action="" method="POST"> --}}
            <span>
            @csrf
            <div class="modal fade magazinierModal " aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Banque</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                                <input type="number" hidden class="form-control" name="id" id="id" value=""/>

                            <div class="mb-3 col-lg-4">
                                <label class="form-label" for="nomBank">Nom de Banque</label>
                                <input type="text" class="form-control" name="nomBank" id="nomBank" value="{{ old('nomBank')}}"/>
                                @error('nomBank')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-4">
                                <label class="form-label" for="telephone">Téléphone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" value="{{ old('telephone')}}"/>
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="form-label" for="adresse">Address</label>
                                <input type="text" class="form-control" name="adresse" id="adresse" value="{{ old('adresse')}}"/>
                                @error('adresse')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label class="form-label" for="numero_compt">Numero de Compte</label>
                                <input type="text" class="form-control" name="numero_compt" id="numero_compt" value="{{ old('numero_compt')}}"/>
                                @error('numero_compt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label class="form-label" for="rib_compt">RIB de Compte</label>
                                <input type="text" class="form-control" name="rib_compt" id="rib_compt" value="{{ old('rib_compt')}}"/>
                                @error('rib_compt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3 col-lg-6">
                                <label class="form-label" for="Solde">Solde</label>
                                <input type="number" class="form-control" name="Solde" id="Solde" value="{{ old('Solde')}}"/>
                                @error('Solde')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label class="form-label" for="Commentaire">Commentaire</label>
                                <input type="text" class="form-control" name="Commentaire" id="Commentaire" value="{{ old('Commentaire')}}"/>
                                @error('Commentaire')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button onclick="storebank()" class="btn btn-warning fw-bold text-white" id="add-btn">Ajouter</button>
                            <button onclick="updatebank()" class="btn btn-warning fw-bold text-white" id="update-btn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
    </span>
        @if($message = Session::get('errorCatch'))
        <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
            <i class="mdi mdi-alert-outline me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Banque</th>
                                    <th>Adresse</th>
                                    <th>Telephone</th>
                                    <th>Numero Compt</th>
                                    <th>RIB Compt</th>
                                    <th>Solde</th>
                                    <th>Commentaire</th>

                                </tr>
                            </thead>

                            <tbody class="text-center">
                                {{-- @foreach($data as $banque) --}}
                                <tr>                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // import swal from 'sweetalert';

        function showModel(nom,id){
            document.querySelector("#category").value = nom;
            document.querySelector("#categoryId").value = id;
            }
                
            $(document).ready(function(){ 
                 displaydatabank();
            });
    

             function displaydatabank(){
            $.ajax({
                url: 'https://iker.wiicode.tech/api/bank',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                var tbody = $('.table tbody');
                tbody.empty(); // Clear the existing table body
                // Loop over the data array
                for (var i = 0; i < data.length; i++) {
                var bank = data[i];
                var row = $('<tr></tr>');

                row.append('<td class="text-warning fw-bold">' + bank.id + '</td>');
                row.append('<td class="TdBanque">' + bank.nomBank + '</td>');
                row.append('<td class="TdTelephone">' + bank.telephone + '</td>');
                row.append('<td class="TdAdresse">' + bank.adresse + '</td>');
                row.append('<td class="TdNumeroCompt">' + bank.numero_compt + '</td>');
                row.append('<td class="TdRIBCompt">' + bank.rib_compt + '</td>');
                row.append('<td class="TdSolde">' + bank.solde + '</td>');
                row.append('<td class="TdCommentaire">' + bank.Commentaire + '</td>');
                row.append('<td>' +
                    '<a onclick="editbank(' + bank.id + ')" class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Détails">' +
                    '<i class="fas fa-info-circle"></i></a>' +
                    '<div><button onclick="deletebank(' + bank.id + ')" class="btn btn-outline-danger btn-sm"> <i class="fas fa-trash-alt"></i></button></div>' +
                    '</td>');

                tbody.append(row);
            }
        },
        error: function() {
            console.error("Error fetching data.");
        }
            });
        }





     

       function  changeBtn() {
            $('input[type="text"]').each(function() {
              $(this).val('');
            });
            $('input[type="number"]').each(function() {
              $(this).val('');
            });
            $("#add-btn").show()
            $("#update-btn").hide()
            $("#myLargeModalLabel").text('Info banque');
       }

        
        function storebank() {
            const NOMBANK = $("#nomBank").val();
            const TELEPHONE = $("#telephone").val();
            const ADRESSE = $("#adresse").val();
            const NUMERO_COMPTE = $("#numero_compt").val();
            const RIB_COMPTE = $("#rib_compt").val();
            const SOLDE = $("#Solde").val();
            const COMMENTAIRE = $("#Commentaire").val();

            $.ajax({
                url: "https://iker.wiicode.tech/api/bank",
                type: "POST",
                data: {
                    nomBank: NOMBANK,
                    adresse: ADRESSE,
                    telephone: TELEPHONE,
                    numero_compt: NUMERO_COMPTE,
                    rib_compt: RIB_COMPTE,
                    solde: SOLDE,
                    Commentaire: COMMENTAIRE
                },
                    dataType: "json",
                    success: function(response) {
                    console.log(response);
                    swal(response.message, "", "success");
                   $(".magazinierModal").modal('hide')
                    displaydatabank();
                    },
                    error: function(response) {
                        console.log(response);
                        console.log(response.responseJSON.message);
                        swal(response.responseJSON.message, "3mr Al9lawi ", "warning");
                        // $(".magazinierModal").modal('hide')
                        //  displaydatabank();
                    }
            });
        }

         function editbank(id){
    
             console.log(id);
            $(".magazinierModal").modal('show')
            $("#add-btn").hide()
            $("#update-btn").show()
            $("#myLargeModalLabel").text('Edit banque');

            $.ajax({
                url: 'https://iker.wiicode.tech/api/bank/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('input[name="id"]').val(data.id);
                    $('input[name="nomBank"]').val(data.nomBank);
                    $('input[name="telephone"]').val(data.telephone);
                    $('input[name="adresse"]').val(data.adresse);
                    $('input[name="numero_compt"]').val(data.numero_compt);
                    $('input[name="rib_compt"]').val(data.rib_compt);
                    $('input[name="Solde"]').val(data.Solde);
                    $('input[name="Commentaire"]').val(data.Commentaire);
                },
                error: function() {
                    console.error("cccccccccccc");
                }
            });
        }
        function updatebank(){
            const ID = $("#id").val();
            const NOMBANK = $("#nomBank").val();
            const TELEPHONE = $("#telephone").val();
            const ADRESSE = $("#adresse").val();
            const NUMERO_COMPTE = $("#numero_compt").val();
            const RIB_COMPTE = $("#rib_compt").val();
            const SOLDE = $("#Solde").val();
            const COMMENTAIRE = $("#Commentaire").val();

            $.ajax({

                url: "https://iker.wiicode.tech/api/bank/ " + ID,
                type: "put",
                data: {
                    nomBank: NOMBANK,
                    adresse: ADRESSE,
                    telephone: TELEPHONE,
                    numero_compt: NUMERO_COMPTE,
                    rib_compt: RIB_COMPTE,
                    solde: SOLDE,
                    Commentaire: COMMENTAIRE
                },
                    dataType: "json",
                    success: function(response) {
                        // $('.table tbody').empty();
                   $(".magazinierModal").modal('hide')
                   swal(response.message, "", "success");
                   displaydatabank();
                    // location.reload();
                    },
                    error: function() {
                    swal(response.message, "", "warning");
                    }
            });
        }

        function deletebank(id){
            swal({
                title: "Are you sure to delete this ?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                           
            $.ajax({
            url: "https://iker.wiicode.tech/api/bank/ " + id ,
            type: "delete",
                dataType: "json",
                success: function(response) {
                console.log(response);
                displaydatabank();
                // location.reload();
                },
                error: function() {
                console.error("cccccccccccc");
                }
            });
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
            });
                        
         
        }
           
        

    </script>
@endsection
