document.addEventListener('DOMContentLoaded', function() {
    fetch('storeData.JSON')
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById('pets-container');
            let email = localStorage.getItem('user_email');
            data.forEach(item => {
                let itemCard = `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="${item.image_url}" height="300px" class="card-img-top" alt="item Image">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">Price: ${item.price} $</p>
    
                                <form action="../Cart/cartInsert.php" method="post">
                                    <input type="text" class="form-control" id="itemName" value="${item.name}" style="display: none" name="itemName">
                                    <input type="text" class="form-control" id="itemPrice" value="${item.price}" style="display: none" name="itemPrice">
                                    <input type="email" class="form-control" id="email" value="${email}" style="display: none" name="email">
                                    <input type="submit" value="Add to Cart" class="btn btn-primary cart-btn">
                                </form>
                            </div>
                        </div>
                    </div>`;
                container.innerHTML += itemCard;
            });
            document.querySelectorAll('.cart-btn').forEach(button => {
                                button.addEventListener('click', function() {
                                    window.location.href = `../Login/checkLogin.php?item=${name}`;
                                });
                            });
                        })
        .catch(error => console.error('Error fetching items data:', error));
});















// document.addEventListener('DOMContentLoaded', function() {
//     fetch('storeData.JSON')
//         .then(response => response.json())
//         .then(data => {
//             let container = document.getElementById('pets-container');
//             let email = localStorage.getItem('user_email');
//             data.forEach(item => {
//                 let itemCard = `
//                     <div class="col-md-4">
//                         <div class="card mb-4">
//                             <img src="${item.image_url}" height="300px" class="card-img-top" alt="item Image">
//                             <div class="card-body">
//                                 <h5 class="card-title">${item.name}</h5>
//                                 <p class="card-text">Price: ${item.price} $</p>
    
//                                 <form action="../Cart/cartInsert.php" method="post">
//                                     <input type="text" class="form-control" id="itemName" value="${item.name}" style="display: none" name="itemName">
//                                     <input type="text" class="form-control" id="itemPrice" value="${item.price}" style="display: none" name="itemPrice">
//                                     <input type="email" class="form-control" id="email" value="${email}" style="display: none" name="email">
//                                     <input type="submit" value="Add to Cart" class="btn btn-primary cart-btn">
//                                 </form>
//                             </div>
//                         </div>
//                     </div>`;
//                 container.innerHTML += itemCard;
//             });

//             document.querySelectorAll('.cart-btn').forEach(button => {
//                 button.addEventListener('click', function() {
//                     let name = this.getAttribute('data-item');
//                     window.location.href = `../Login/checkLogin.php?item=${name}`;
//                 });
//             });
//         })
//         .catch(error => console.error('Error fetching items data:', error));
// });