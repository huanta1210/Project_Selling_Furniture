function totalBill() {
    const quantityInput = document.querySelector('#quantity');
    const priceInput = 1200;
    const checkNumber = parseInt(quantityInput.value) || 0;
    const totalPrice = checkNumber * priceInput;
    const totalAmountElement = document.querySelector('.totalAmount');
    totalAmountElement.textContent = totalPrice + '$';
    const totalAmountElements = document.querySelector('.totalAmounts');
    totalAmountElements.textContent = totalPrice + '$';
}
