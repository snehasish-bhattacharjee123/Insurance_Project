@extends('frontend.exc.extend')

@section('content')  
   
    @forelse($post as $p)
        <div class="card-container">
            <div class="card">
                <div class="card-profile-image">
                    <img src="{{asset('assets/adminpanel/profile/image/'.$user->profile_image)}}" alt="" style="object-fit: cover;">
                    <h2 class="profile-name">{{$user->name}}</h2>
                </div>
                <div class="profile-caption">
                    <p class="short-text" data-full-text="{{$p->caption}}">
                    </p>
                    <a href="javascript:void(0);" class="more-link" onclick="toggleText(this)">See more</a>
                </div>
                <div class="card-image">
                    <img src="{{asset('storage/post/'.$p->posts_image)}}" alt="" style="object-fit: cover;">
                </div>
                <div class="description">
                    <span class="long-text" data-full-text="{{$p->description}}"></span>
                    <a href="javascript:void(0);" class="more-link-description" onclick="toggleDescriptionText(this)" style="margin-left: 10px; margin-bootom: 20px;">See more</a>
                </div>
            </div>
        </div> 
    @empty
       <p class="text text-primary text-center" style="font-size: 35px; font-weight: 700; margin-top:35px">No Posts Available!</p> 
    @endforelse

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
