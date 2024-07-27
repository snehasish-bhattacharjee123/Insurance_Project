@extends('frontend.exc.extend')

@section('content')
    <div class="card-container">
        <div class="card">
            <div class="card-profile-image">
                <img src="suman.jpg" alt="">
                <h2 class="profile-name">Suman Roy</h2>
            </div>
            <div class="profile-caption">
                <p class="short-text" data-full-text="Lorem ipsum dolor sit amet  suman sumansumansumansumansumansumansumansumansumansumansumansuman">
                </p>
                <a href="javascript:void(0);" class="more-link" onclick="toggleText(this)">See more</a>
            </div>
            <div class="card-image">
                <img src="iphone.webp" alt="" style="object-fit: cover;">
            </div>
            <div class="description">
                <span class="long-text" data-full-text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum doloremque facere distinctio, voluptates numquam sunt eligendi dignissimos cum repudiandae explicabo, excepturi doloribus eaque veritatis animi laudantium illum vero iusto qui?"></span>
                <a href="javascript:void(0);" class="more-link-description" onclick="toggleDescriptionText(this)" style="margin-left: 10px; margin-bootom: 20px;">See more</a>
            </div>
        </div>
    </div>
    <div class="card-container">
        <div class="card">
            <div class="card-profile-image">
                <img src="suman.jpg" alt="">
                <h2 class="profile-name">Suman Roy</h2>
            </div>
            <div class="profile-caption">
                <p class="short-text" data-full-text="Lorem ipsum dolor sit amet, consectetur adipisicing elit...">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                </p>
                <a href="javascript:void(0);" class="more-link" onclick="toggleText(this)">See more</a>
            </div>
            <div class="card-image">
                <img src="iphone.webp" alt="" style="object-fit: cover;">
            </div>
            <div class="description">
                <span class="long-text" data-full-text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum doloremque facere distinctio, voluptates numquam sunt eligendi dignissimos cum repudiandae explicabo, excepturi doloribus eaque veritatis animi laudantium illum vero iusto qui?"></span>
                <a href="javascript:void(0);" class="more-link-description" onclick="toggleDescriptionText(this)" style="margin-left: 10px; margin-bootom: 20px;">See more</a>
            </div>
        </div>
    </div>

    <script>
        function toggleText(link) {
            const paragraph = link.previousElementSibling;
            const fullText = paragraph.getAttribute('data-full-text');
            const isExpanded = paragraph.classList.toggle('expanded');

            if (isExpanded) {
                paragraph.textContent = fullText;
                link.textContent = 'See less';
            } else {
                const truncatedText = fullText.substring(0, 40) + '...';
                paragraph.textContent = truncatedText;
                link.textContent = 'See more';
            }

            // Adjust the card's height based on expanded content
            const card = link.closest('.card');
            card.style.height = 'auto'; // Reset height to auto to accommodate expanded content
            const newHeight = card.scrollHeight; // Get the new height based on content
            card.style.height = newHeight + 'px'; // Set the card's height to the new height
        }

        function toggleDescriptionText(link) {
            const span = link.previousElementSibling;
            const fullText = span.getAttribute('data-full-text');
            const isExpanded = span.classList.toggle('expanded');

            if (isExpanded) {
                span.textContent = fullText;
                link.textContent = 'See less';
            } else {
                const truncatedText = fullText.substring(0, 200) + '...';
                span.textContent = truncatedText;
                link.textContent = 'See more';
            }

            // Adjust the card's height based on expanded content
            const card = link.closest('.card');
            card.style.height = 'auto'; // Reset height to auto to accommodate expanded content
            const newHeight = card.scrollHeight; // Get the new height based on content
            card.style.height = newHeight + 'px'; // Set the card's height to the new height
        }

        document.addEventListener('DOMContentLoaded', function() {
            const paragraphs = document.querySelectorAll('.profile-caption .short-text');
            paragraphs.forEach(paragraph => {
                const fullText = paragraph.getAttribute('data-full-text');
                if (fullText.length > 40) {
                    paragraph.textContent = fullText.substring(0, 40) + '...';
                } else {
                    paragraph.textContent = fullText; // Show normal text
                    const moreLink = paragraph.nextElementSibling;
                    moreLink.style.display = 'none'; // Hide "See more" link
                }
            });

            const spans = document.querySelectorAll('.description .long-text');
            spans.forEach(span => {
                const fullText = span.getAttribute('data-full-text');
                if (fullText.length > 200) {
                    span.textContent = fullText.substring(0, 200) + '...';
                } else {
                    span.textContent = fullText; // Show normal text
                    const moreLink = span.nextElementSibling;
                    moreLink.style.display = 'none'; // Hide "See more" link
                }
            });
        });
    </script>
    
@endsection
