<script type="text/javascript">
            let addbtn = document.querySelectorAll('#add');
            let subbtn = document.querySelectorAll('#minus');
            let qty = document.querySelectorAll('#qtyBox');
            addbtn.forEach (e => console.log (e));
            for (let i = 0; i < addbtn.length; i++){
                addbtn[i].addEventListener ('click', ()=>{
                    qty[i].value = parseInt (qty[i].value) + 1;
                    productTotal();
                })
            
            }
            console.log (subbtn);
            for(let i = 0; i < subbtn.length; i++){
                subbtn[i].addEventListener ('click', () =>{
                    if (qty[i].value < 1){
                    qty[i].value = 0;
                    } else {
                        qty[i].value -= 1;
                    }
                    productTotal();
                 })
            }   
            function productTotal(){
                 var cartRows = document.getElementsByClassName('qtybox')
           
                var total = 0
                for(var i=0; i<cartRows.length; i++){
                    var priceElement = document.getElementsByClassName('pt-2')[i]
                    // alert(priceElement.innerHTML)
                    var quantityElement = document.getElementsByClassName('form-control w-25 d-inline')
                    [i]
                    var price = parseFloat(priceElement.innerHTML.replace('₱', ''))
                    var quantity = quantityElement.value
                    total = total + (price * quantity)
                }
                document.getElementById('salestotal').value = total
                document.getElementById('totalpayable').innerHTML ='₱' + total
                document.getElementById('totalvalue').innerHTML ='₱' + total
               
            }
           
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>