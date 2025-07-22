function remove(e)
{
    const cardNeedToBeRemove = e.target.closest('.cart-item');
    cardNeedToBeRemove.remove();
    calculateTotalPrice();
}

function changeQuantity(e, id)
{
    fetch('/api/changeQuantity?id=' + id + '&quantity=' + e.target.value).then(response => response.json()).then(data => {
        document.getElementById('total-price').innerHTML = data.totalPrice.toLocaleString('vi-VN') + 'đ';
    })
    .
    catch(error => console.log(error));

    
}

