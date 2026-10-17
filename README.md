# LA9 – Your Own Table, Your Own Model

### F1. Which column did you make nullable, and why that one and not another?

I made the `author` column nullable because some books may not have a recorded author. I kept `title`, `pages`, and `is_available` required because they are important information for each book in my library.

### F2. Which step failed first for you, and what did the error say?

My seeder first failed because of a namespace declaration error in `BookSeeder.php`. The error said that the namespace declaration had to be the very first statement or after any declare statement, so I fixed the file and checked it again.

### F3. You changed no Blade file in Part D, yet your pages still work. Why not?

My pages still work because I kept the same view names and continued passing the data the views need from `BookController`. I changed the controller to retrieve book records using the `Book` model and Eloquent instead of reading them from a JSON file.