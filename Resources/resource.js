
    document.addEventListener('DOMContentLoaded', function() {
        fetch('blog.JSON')
            .then(response => response.json())
            .then(data => {
                const healthCards = document.getElementById('health-cards');
                let maxHeight = 0;

                data.forEach(item => {
                    const card = document.createElement('div');
                    card.className = 'col-md-4 mb-4';
                    
                    const cardContent = `
                        <div class="card shadow-sm">
                            <div class="card-body">
                                ${item.title ? `<h3 class="text-center mb-4 mt-3">${item.title}</h3>` : ''}
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">${item.description}</p>
                                <div class="see-more-container">
                                    ${item.ref_link ? `<a href="${item.ref_link}" class="learn-btn mt-3" target="_blank">Learn More</a>` : ''}
                                </div>
                            </div>
                        </div>`;

                    card.innerHTML = cardContent;
                    healthCards.appendChild(card);

                    // see more button configuaration
                    const cardText = card.querySelector('.card-text');
                    if (cardText.scrollHeight > cardText.clientHeight) {
                        const seeMoreButton = document.createElement('button');
                        seeMoreButton.className = 'learn-btn';
                        seeMoreButton.setAttribute("data-bs-toggle","modal");
                        seeMoreButton.setAttribute("data-bs-target","#staticBackdrop");
                        seeMoreButton.innerText = 'See More';
                        seeMoreButton.onclick = function() {
                            showFullText(item);
                        };
                        card.querySelector('.see-more-container').prepend(seeMoreButton);
                    }

                    const cardHeight = card.querySelector('.card').offsetHeight;
                    if (cardHeight > maxHeight) {
                        maxHeight = cardHeight;
                    }
                });

                document.querySelectorAll('.card').forEach(card => {
                    card.style.height = `${maxHeight}px`;
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    });

    function showFullText(item) {
        // modal creation
        const modal = document.createElement('div');
        modal.innerHTML = `
           <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">${item.title}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-break">
        ${item.description}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>`;

        document.body.appendChild(modal);

    }