<link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@400;500;600&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


<style>
body{
    background-color: #fc8f9f;
    display: flex;
    justify-content: center;
    align-items: center;
}
.thankyou-container{
    font-size: 25px;
    justify-content: center;
    padding-top: 25px;
    border: 1px solid black;
    border-radius: 25px;
    width: 400px;
    height: 300px;
}
.thankyou-container p {
    text-align: center;
    justify-content: center;
}
i{
    padding-left: 45%;
    height: 25px;
    padding-top: 10px;
}
.content{
    font-size: 20px;
}
.btn{
    text-decoration: none;
    display: flex;
    justify-content: center;
    background-color: black;
    margin: 0px 80px ;
    padding: 10px 0px;
    border-radius: 25px;
    color: white;
    font-size: 17px;
}
</style>



<div class="thankyou-container">

    <p class="heading">Opss..!</p>
    <i class="fa-regular fa-face-meh fa-2xl"></i>
    <p class="content">Something Went Wrong</p>
    <p class="content">Try again Later</p>
    <a class="btn" href="{{ url('/redirect') }}">continue shopping</a>

</div>
