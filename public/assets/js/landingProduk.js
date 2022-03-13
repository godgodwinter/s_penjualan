

function storeCariData(inputancari='',inputanUrl='#'){
    let contentResponse = '';
    let datas=null;
    //fetch data example
    $.ajax({
        url: inputanUrl,
        type: "GET",
        data: {
            cari: inputancari
        },
        success: function (response) {
            // console.log(response.data);
            datas = response.data;
            let jmlDataResponse = datas.length;
            for (let i = 0; i < jmlDataResponse; i++) {
                contentResponse += `
<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
<div class="card border-0 bg-white text-center p-1" >
<img src="https://ui-avatars.com/api/?name=${datas[i].nama}&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 200px;object-fit: cover"> 
<div class="card-body">
<h5 class="card-title">${datas[i].nama}</h5>
<p class="card-text">Harga : Rp ${rupiah(datas[i].harga_jual)},00</p>
<button  class="btn btn-info addProduk" onclick="storeProduk(${datas[i].id},'${datas[i].nama}',${datas[i].harga_jual})">Add</button>
</div>
</div>
</div>
`;
            }
            $('#contentCari').html(contentResponse);
        }
    });

}