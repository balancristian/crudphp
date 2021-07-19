$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    let id=$("input[name*='book_id'");
    let bookname=$("input[name*='book_name'");
    let bookpublisher=$("input[name*='book_piblisher'");
    let bookprice=$("input[name*='book_price'");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookpublisher.val(textvalues[2]);
    bookprice.val(textvalues[3].replace("$", ""));
});
function displayData(e){
    let id=0;
    const td = $("#tbdoy tr td");
    let textvalues = [];
    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}