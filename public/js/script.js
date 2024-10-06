var pesan = document.getElementById('message');

if(!pesan.innerHTML.trim()){
    pesan.style.display = "none";
}else{
    pesan.style.display = "block";
}
