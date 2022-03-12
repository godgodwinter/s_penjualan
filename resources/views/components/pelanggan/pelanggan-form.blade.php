<div>
    <form id="setting-form" method="POST" action="{{$item?route('admin.pelanggan.update',$item->id):route('admin.label.store')}}">
    @php
    //declare var
        $nama='';
        $username=null;
        $email=null;
        $jk='';
        $alamat='';
        $telp='';
        $users_id='';
        $tipeuser='pelanggan';
        $nomerinduk=null;
        $password=null;
    @endphp
        @if($item)
        @method('put')
    @php
    //init while items>0
        $nama=$item->nama;
        $username=$item->users?$item->users->username:null;
    @endphp
        @endif
        @csrf
    <div class="row py-2 px-2">
        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" required  value="{{old('nama')?old('nama'):$nama}}">

              @error('nama')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

          @push('before-script')
              <script>
$(function () {
    var statusInputUsername = 0;
    var statusInputEmail = 0;
    var statusInputPassword=0;
    var periksaKesamaanPassword=0;
    let statusDanger = ` <i class="fa-solid fa-circle-xmark fill-current text-danger text-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="Data sudah digunakan!"></i>`;
    let statusInfo = ` <i class="fa-solid fa-circle-check  fill-current text-info text-lg"></i>`;
    let btnSubmit = `<button class="btn btn-primary" id="save-btn">Simpan</button>`;
    let btnSubmitDisabled = `<span class="btn btn-dark" id="save-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled">Simpan</span>`;

    $('#inputPassword').keyup(function (e) { 
        periksaKesamaanPassword=periksaPassword();
        if(periksaKesamaanPassword<1 || $(this).val().length<3){
            $('#labelPassword').html('Password '+statusDanger);
            $('#labelPassword2').html('Konfirmasi Password '+statusDanger);
            statusInputPassword=0;
        }else{
            $('#labelPassword').html('Password '+statusInfo);
            $('#labelPassword2').html('Konfirmasi Password '+statusInfo);
            statusInputPassword=1;
        }
        periksaData();
    });

    $('#inputPassword2').keyup(function (e) { 
        periksaKesamaanPassword=periksaPassword();
        if(periksaKesamaanPassword<1 || $(this).val().length<3){
            $('#labelPassword').html('Password '+statusDanger);
            $('#labelPassword2').html('Konfirmasi Password '+statusDanger);
            statusInputPassword=0;
        }else{
            $('#labelPassword').html('Password '+statusInfo);
            $('#labelPassword2').html('Konfirmasi Password '+statusInfo);
            statusInputPassword=1;
        }
        periksaData();
    });

    $('#inputUsername').keyup(function (e) {
        // console.log($(this).val());

        //fetch data example
        $.ajax({
            url: "{{route('api.users.periksausername')}}",
            type: "GET",
            data: {
                username: $(this).val()
            },
            success: function (response) {
                // console.log(response.data);
                if (response.data > 0) {
                    $('#labelUsername').html('Username ' + statusDanger);
                    statusInputUsername = 0;
                } else {
                    $('#labelUsername').html('Username ' + statusInfo);
                    statusInputUsername = 1;
                }
                periksaData();
            }
        });
    });


    $('#inputEmail').keyup(function (e) {
        // console.log($(this).val());

        let validateEmailStatus = periksaEmail($(this).val());
        if (validateEmailStatus > 0) {
            //fetch data example
            $.ajax({
                url: "{{route('api.users.periksausername')}}",
                type: "GET",
                data: {
                    email: $(this).val()
                },
                success: function (response) {
                    // console.log(response.data);
                    if (response.data > 0) {
                        $('#labelEmail').html('Email ' + statusDanger);
                        statusInputEmail = 0;
                    } else {
                        $('#labelEmail').html('Email ' + statusInfo);
                        statusInputEmail = 1;
                    }
                    periksaData();
                }
            });
        } else {
            $('#labelEmail').html('Email ' + statusDanger);
            $('#divBtnSubmit').html(btnSubmitDisabled);

        }
    });

    //method / function
    function periksaData() {
        if (statusInputUsername > 0 && statusInputEmail > 0 && statusInputPassword > 0) {
            $('#divBtnSubmit').html(btnSubmit);
        } else {
            $('#divBtnSubmit').html(btnSubmitDisabled);
        }
    }

    function periksaEmail(inputText) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (inputText.match(mailformat)) {
            // console.log("Valid email address!");
            // document.form1.text1.focus();
            return 1;
        } else {
            // console.log("You have entered an invalid email address!");
            // alert("You have entered an invalid email address!");
            // document.form1.text1.focus();
            return 0;
        }
    }
    function periksaPassword(){
        if($('#inputPassword').val()==$('#inputPassword2').val()){
            return 1;
        }else{
            return 0;
        }
    }
});
              </script>
          @endpush

            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelUsername">Username 
                    {{-- <i class="fa-solid fa-circle-xmark fill-current text-danger text-lg"></i> --}}
                    {{-- <i class="fa-solid fa-circle-check  fill-current text-info text-lg"></i> --}}
                </label>
                <div class="col-sm-6 col-md-9">

                  <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" required  value="{{old('username')?old('username'):$username}}" id="inputUsername">

                  @error('username')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>


            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelEmail">Email </label>
                <div class="col-sm-6 col-md-9">

                  <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" required  value="{{old('email')?old('email'):$email}}" id="inputEmail">

                  @error('email')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>

              <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelPassword">Password </label>
                <div class="col-sm-6 col-md-9">

                  <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required  value="{{old('password')?old('password'):$password}}" id="inputPassword">

                  @error('password')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>


              <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-3 text-md-right" id="labelPassword2">Konfirmasi Password </label>
                <div class="col-sm-6 col-md-9">

                  <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password2" required  value="{{old('password')?old('password'):$password}}"  id="inputPassword2">

                  @error('password')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
              </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Jenis Kelamin </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('jk') is-invalid @enderror" name="jk" required  value="{{old('jk')?old('jk'):$jk}}">

              @error('jk')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Alamat </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" required  value="{{old('alamat')?old('alamat'):$alamat}}">

              @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-3 text-md-right">No Telp </label>
            <div class="col-sm-6 col-md-9">

              <input type="text" class="form-control  @error('telp') is-invalid @enderror" name="telp" required  value="{{old('telp')?old('telp'):$telp}}">

              @error('telp')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>

              <div class="card-footer d-flex justify-content-between flex-row-reverse" id="divBtnSubmit">
                <span class="btn btn-dark" id="save-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled">Simpan</span>
              </div>
      </div>
      </form>

</div>