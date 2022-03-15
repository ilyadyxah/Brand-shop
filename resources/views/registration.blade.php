@extends('base')

@section('main')
    <nav class="navigation">
        <div class="wrap navigation-wrap navigation-mobile">
            <p class="navigation-arrivals">REGISTRATION</p>
        </div>
    </nav>
    <main class="registration wrap">
        <form action="#" class="registration-form">
            <fieldset>
                <legend>Your Name</legend>
                <input type="text" placeholder="First Name" class="input-reg">
                <input type="text" placeholder="Last Name" class="input-reg"></fieldset>
            <fieldset class="reg-radio">
                <input type="radio" id="gender-m" name="gender">
                <label for="gender-m">Male</label>
                <input type="radio" id="gender-f" name="gender">
                <label for="gender-f">Female</label>
                <input type="radio" id="gender-o" name="gender">
                <label for="gender-o">Other</label>
            </fieldset>
            <fieldset>
                <legend>Login details</legend>
                <input type="email" placeholder="Email" class="input-reg">
                <input type="password" placeholder="Password" class="input-reg">
                <p class="text-reg">Please use 8 or more characters, with at least 1 number and a mixture of uppercase
                    and lowercase letters</p>
                <div class="btn-join-animation">
                    <input type="submit" value="JOIN NOW" class="btn-join">
                </div>
            </fieldset>
        </form>
        <aside class="loyality">
            <h2>LOYALTY HAS ITS PERKS</h2>
            <p>Get in on the loyalty program where you can earn points and unlock serious perks. Starting with these as
                soon as you join:</p>
            <ul>
                <li>15% off welcome offer</li>
                <li>Free shipping, returns and exchanges on all orders</li>
                <li>$10 off a purchase on your birthday</li>
                <li>Early access to products</li>
                <li>Exclusive offers and rewards</li>
            </ul>
        </aside>
    </main>
@endsection
