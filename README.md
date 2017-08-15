# bookapitest
Test wordpress plugin. Access to book API

> Installation:
- Create a folder 'book-api-test' on plugins directory and clone the repository
- Activate plugin on WP admin.
- In settings/BookApiTestSettings configure API key and service URL.
- Create a custom page with url /books
- Access the books custom page to display the books

> Comments:
- It was some time since I haven't worked on Wordpress plugin so I had to put up to date.
- I didn't had time to do all improvements needed.
- First thing I have added is automated testing for the developed code or refactor using a TDD approach.
- The plugin only filters by a list of ISBN's or a collection alias, which are now hardcoded on the plugin main file.
For a more useful application the next step would be to let user select the filtering data, and next add code for other filtering options.
- Presentation should also been improved, I focused on the backend.
