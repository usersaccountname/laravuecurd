@extends('layouts.land')

@section('content')
    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            //Service 1
            <div class="carousel-item active">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7M6RGnkquE73H26L-y99HL__R79KEwg01Dg&usqp=CAU" alt="Service 1">
                <div class="carousel-caption">
                    <h1 class="fw-bold text-dark">Instructor Login</h1>
                    <p class="lead">Access the system as an instructor.</p>
                    <a href="{{ route('ilogin') }}" class="btn btn-primary p-auto"><strong>Login as Instructor</strong></a>
                </div>
            </div>
            //Service 2
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgK7jp_hLiCLvgxVQ1rs6GKe550HFoW82uxw&usqp=CAU" class="d-block w-100" alt="Service 2">
                <div class="carousel-caption">
                    <h1 class="fw-bold text-dark">Student Login</h1>
                    <p class="lead">Access the system as a student.</p>
                    <a href="{{ route('slogin') }}" class="btn btn-primary p-auto"><strong>Login as Student</strong></a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>







    <!-- About Us Section -->
    <div class="container-fluid pt-5">
        <h2>About Us</h2>
        <p>At Community School, we believe in the transformative power of education and the strength of a connected community. Established with a vision to nurture young minds and build a foundation for lifelong learning, our school is a vibrant hub of knowledge, diversity, and shared values.</p>

        <p>Our dedicated team of educators is committed to fostering a holistic learning environment where each student is encouraged to explore their unique talents, embrace curiosity, and develop critical thinking skills. We celebrate diversity and inclusivity, creating a warm and welcoming atmosphere where students from various backgrounds come together to learn, grow, and form lasting friendships.</p>

        <p>Community School is not just a place for academic excellence; it's a place where character is shaped, values are instilled, and a sense of responsibility towards the community is cultivated. We actively engage in community outreach programs, empowering our students to become compassionate, socially responsible individuals.</p>

        <p>In our modern and well-equipped facilities, students have the opportunity to explore a rich curriculum, participate in extracurricular activities, and discover their passions. We believe in the power of collaboration, encouraging teamwork and communication skills that extend beyond the classroom.</p>

        <p>As a cornerstone of the community, our school values the partnership between educators, parents, and students. Together, we create a supportive network that ensures every student receives the guidance they need to achieve their full potential.</p>

        <p>At Community School, we are not just shaping students; we are nurturing future leaders, thinkers, and contributors to society. Join us on this exciting educational journey where we inspire, learn, and grow together as a community.</p>
    </div>



<script src="{{ mix('js/app.js') }}"></script>
@endsection
