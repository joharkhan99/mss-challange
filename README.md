## Welcome to MSS Coding Challenge
Please read these instructions carefully in order to complete this challenge.

Please note that the purpose of this challenge is for us to get a sense of your coding style and whether it will be a good match for us. There is no right or wrong answer. Just know that we value practical code over flashy code and efficiency and code readablity.

That said, lets get to the instructions:


- First create a new repository with this starter code and push it up to a private repository on github or bitbucket. Try to make atomic commits while you are working.

- In order to setup the project do the necessary steps to install dependencies and fill out the .env file for database connection.

- After that install the frontend packages using `npm` or `yarn` and compile them using the `dev` command.

- Migrate the database using `--seed` flag to also load the test data.

- Go to `/login` inside the app and login using one of the generated users in the database. The password for all users is 'password'.

- This is where your implementation will go.

## Requirements

- Show a table of customers that belong to the logged in user.
- Results should be ordered in a way that the customers with most points should show on top and if there is a tie on points then it should be broken by the last name of a customer.
- Show the following fields (id, fullname, points, email)
- Show an additional column for Actions, which will contain 2 actions for every customer. 
    - Promote: this should increase the customer's points by 10 if customer is male and by 5 if she is female. 
    - Demote: This should decrease the customer's points by 5 if customer is male and by 2 if she is female.
- Implement search functionality, which allows the user to search for a customer based on email or last name.

These are main functional requirements. Please feel free to awesomize the UI as much as you can to give us an idea of what you can do.

After you are done add `mubashir.abbas@outlook.com` to your respository as a collaborator and then send an email to [mabbas@apiomni.com](mailto:mabbas@apiomni.com) to let us know that you are done.




