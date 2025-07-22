const paymentStatus = document.getElementById('payment-status');

if(paymentStatus.innerText == 'Chưa thanh toán')
{
    paymentStatus.style.cssText = 'color: red';
} 
else
{
    paymentStatus.style.cssText = 'color: green';
}