function refreshDataRestok(){
    let getData=storeGetProduk();
    if(getData){
    let data=getData.map(function(el,index){
        return `<tr>
        <td>${index+1}</td>
        <td><button class="btn btn-danger btn-sm" onclick="storeHapusData(${el.id})">Hapus</button></td>
        <td>${el.nama}</td>
        <td>${el.harga_jual}</td>
        <td>${el.harga_beli}</td>
        <td class="text-center">${el.jumlah}</td>
        <td class="text-center">${el.total}</td>
        </tr>`
    }).join('');
    document.querySelector('#trbody').innerHTML=data;
    }
}

function storeGetProduk(){
    let getData=JSON.parse(localStorage.getItem('restokItems'));
    // console.log(getData);
    return getData;
}
function storeProduk(id=null,nama=null,harga_jual=null){	
    var dataTemp = {
        id:id,
        nama:nama,
        harga_jual:harga_jual,
        harga_beli:harga_jual,
        jumlah:0,
        total:0,
    }
    //ambilDataLocalStorage
    //ubah menjadi array and object
    let getData=storeGetProduk();
    if(getData!=null){
        //jika data tidak ditemukan maka tambahkan ke localstorage
        if(storePeriksa(dataTemp.id)<1){
            // console.log(getData);
            getData.push(dataTemp);
            //tambahkan dataTemp ke array
            //store data ke local storage
            localStorage.setItem('restokItems',JSON.stringify(getData));
            console.log('Data berhasil di tambahkan');
        }
        }else{
            if(storePeriksa(dataTemp.id)<1){
                localStorage.setItem('restokItems',JSON.stringify([dataTemp]));
                console.log('Data berhasil di dibuat');
                storeGetProduk();
            }
        }
    // console.log(storePeriksa(id));
    refreshDataRestok();
}


function storePeriksa(id=null) {
    let getData=storeGetProduk();
    if(getData!=null){
        var periksa= getData.filter(function (el) {
            return el.id == id;
            })
            // console.log(periksa.length);
        return periksa.length
        }else{
            // console.log(0);
            return 0
        }
  }
  function storeHapusData(id=null){
    let getData=storeGetProduk();
    if(getData!=null){
        let jmlData=getData.length;
        for(let i=0;i<jmlData;i++){
            console.log(getData[i].id);
            if(getData[i].id==id){
                getData.splice(i,1);
                localStorage.setItem('restokItems',JSON.stringify(getData));
            //     console.log(getData);
                // console.log('Data berhasil di hapus',getData);
                refreshDataRestok();
            }
        }
    }
}
