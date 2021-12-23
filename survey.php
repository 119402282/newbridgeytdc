<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./js/form.js" type="text/javascript" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
    <title>form</title>
</head>
<body>

    <form id="survey" class="container w-50 d-flex" style="position: absolute; top: 50%;left:50%; transform: translate(-50%, -50%); min-height: 50vh; flex-direction: column; gap: 3rem; justify-content: center;" method="post">
        <h2><?= echo 'Survey ' . (4*4) ?></h2>
        <div class="hero-text">Please submit your name and phone number below to show your interest. We will be in touch with you soon.</div>
        <div class="form-floating mb-3">
            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" autocomplete="name" required />
            <label for="fullname">Full Name</label>
        </div>
        <div class="form-floating">
            <input type="tel" name="phone" class="form-control" id="phone" placeholder="08X XXX XXXX" autocomplete="tel-national" required />
            <label for="phone">Mobile number</label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Show Interest</button>
        </div>
    </form>
</body>
</html>