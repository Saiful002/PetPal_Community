document.addEventListener('DOMContentLoaded', function() {
    let email = localStorage.getItem('user_email');
    fetch('petsData.JSON')
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById('pets-container');
            
            data.forEach(pet => {
                let petCard = `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="${pet.image_url}" class="card-img-top" alt="Pet Image">
                            <div class="card-body">
                                <h5 class="card-title">${pet.name}</h5>
                                <p class="card-text">Breed: ${pet.breed}</p>
                                <p class="card-text">Age: ${pet.age}</p>
                                <p class="card-text">Personality: ${pet.personality}</p>
                                <form action="../Ledger/ledgerInsert.php" method="post">
                                    <input type="text" class="form-control" id="petName" value="${pet.name}" style="display: none" name="petName">
                                    <input type="text" class="form-control" id="petBreed" value="${pet.breed}" style="display: none" name="petBreed">
                                    <input type="email" class="form-control" id="email" value="${email}" style="display: none" name="email">
                                    <input type="submit" value="Adopt" class="btn btn-primary adopt-btn">
                                </form>
                            </div>
                        </div>
                    </div>`;
                container.innerHTML += petCard;
                
            });
            document.querySelectorAll('.adopt-btn').forEach(input => {
                input.addEventListener('click', function() {
                    window.location.href = `../Login/checkLogin.php?pet=${petName}`;   
                });
            });
            

})});