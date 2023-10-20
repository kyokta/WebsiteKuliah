@extends('auth.layouts')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lora&family=Open+Sans:wght@500&display=swap');

        #profile-image {
            border-radius: 75%;
            width: 100%;
            height: 100%;
        }

        #profile-name {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            align-content: center;
        }

        #profile-name h1 {
            font-family: 'Lora', serif;
            font-size: 75px;
            font-weight: bold;
            color: #851C00;
        }

        .summary, .experience, .contact, .skills, .education {
            padding: 20px;
        }

        .list-experiences {
            margin-bottom: 30px;
        }

        .summary h2, .experience h2, .contact h2, .skills h2, .education h2 {   
            font-family: 'Lora', serif;
            font-size: 30px;
            font-weight: bold;
            color: #851C00;
        }

        .list-experiences h4 {
            font-family: 'Open Sans', sans-serif;
            font-size: 20px;
            font-weight: bold;
            color: #851C00;
        }

        .list-experiences h6 {
            font-style: italic;
        }
    </style>

    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-2">
                <img src="me.jpg" id="profile-image">
            </div>
            <div class="col-md-10" id="profile-name">
                <h1>RIZKY OKTARINANTO</h1>
            </div>
            <div class="col-md-8" style="margin-top: 20px;">
                <div class="summary">
                    <h2>SUMMARY</h2>
                    <hr>
                    <p>I am an undergraduate student from Gadjah Mada University majoring in Software Engineering. I have
                        several organization experiences and working experience as a web developer. I have a high curiosity
                        in information and technology. I am responsive, can work in a team or individually and can work
                        under pressure.</p>
                </div>
                <div class="experience">
                    <h2>EXPERIENCES</h2>
                    <hr>
                    <div class="list-experiences">
                        <h4>LIASON OFFICER (LO) in GELANGGANG EXPO UGM 2023</h4>
                        <h6>Gadjah Mada University – Yogyakarta, Indonesia</h6>
                        <h6>May 2023 - August 2023</h6>
                        <ul>
                            <li>Acting as committee’s representative for external affairs</li>
                            <li>Coordinating with Student Activity Unit about concept and technical standart of the event</li>
                        </ul>
                    </div>
                    <div class="list-experiences">
                        <h4>PRESIDENT of SUB-VILLAGE YOUTH ORGANIZATION</h4>
                        <h6>Kring X Sapen Sub-Village Organization – Sleman, Indonesia</h6>
                        <h6>September 2020 – February 2023</h6>
                        <ul>
                            <li>Lead the organization</li>
                            <li>Helped Village Chief for conducting social activity</li>
                            <li>Coordinated with all parties for conducting an event</li>
                        </ul>
                    </div>
                    <div class="list-experiences">
                        <h4>TRAINING AND EDUCATIONAL STAFF</h4>
                        <h6>Tunas Harapan Umbulmartani Youth Organization – Sleman, Indonesia</h6>
                        <h6>January 2022 - January 2023</h6>
                        <ul>
                            <li>Arranging educational activity for children in Umbulmartani</li>
                            <li>Conducting public speaking course for youth organization</li>
                        </ul>
                    </div>
                    <div class="list-experiences">
                        <h4>WEB DEVELOPER INTERN</h4>
                        <h6>CV. Karya Hidup Sentosa (Quick Traktor) – Yogyakarta, Indonesia </h6>
                        <h6>Juni 2021 – Juni 2022</h6>
                        <ul>
                            <li>Developed employee information website</li>
                            <li>Managed company database</li>
                            <li>Fixed website bugs</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: 20px;">
                <div class="contact">
                    <h2>CONTACT</h2>
                    <hr>
                    <table>
                        <tr>
                            <td><b>Email</b></td>
                            <td><b>:</b></td>
                            <td><a href="">rizky@gmail.com</a></td>
                        </tr>
                        <tr>
                            <td><b>No. Hp</b></td>
                            <td><b>:</b></td>
                            <td>082134567890</td>
                        </tr>
                        <tr>
                            <td><b>Address</b></td>
                            <td><b>:</b></td>
                            <td>Sleman, Yogyakarta</td>
                        </tr>
                    </table>
                </div>
                <div class="skills">
                    <h2>SKILLS</h2>
                    <hr>
                    <ul>
                        <li>Programming</li>
                        <li>Public Speaking</li>
                        <li>Leadership</li>
                        <li>Writing</li>
                    </ul>
                </div>
                <div class="education">
                    <h2>EDUCATION</h2>
                    <hr>
                    <div class="list-education">
                        <h5>Vocational Undergraduate Program: Software Engineering</h5>
                        <h6>Gadjah Mada University – Yogyakarta, Indonesia</h6>
                        <h6>August 2022 - Present</h6>
                        <h6>Related Course :</h6>
                        <ul>
                            <li>Object Oriented Programming</li>
                            <li>Web Developer</li>
                            <li>Mobile Developer</li>
                            <li>Database Management</li>
                        </ul>
                    </div>
                    <div class="list-education">
                        <h5>Information System, Network, and Application</h5>
                        <h6>2 Depok Sleman Vocational High School</h6>
                        <h6>July 2018 – June 2022</h6>
                        <h6>Related Cource :</h6>
                        <ul>
                            <li>IaaS</li>
                            <li>SaaS</li>
                            <li>PaaS</li>
                            <li>Network Security</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
