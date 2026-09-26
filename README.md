# LA6 – Two Filters, One Route

## Q1. Why was no new route needed?

I did not need to add another route because both filters use the same books list route. Laravel's router checks the URL path and HTTP method, not the query string values. My index method reads the genre and rating using the Request object. This allows both filters to work together without adding another route.

## Q2. What if both filters used route parameters?

If I used route parameters, I could make a URL like `/books/none/4` for year 4 without a course filter. I would need to use `none` as a placeholder because route parameters are part of the URL path. The route would need to account for the missing course value. Query strings are more flexible because I can leave one filter out.

## Q3. Why does the navigation stay active?

I changed the navigation pattern to `books*` so it matches both the books list and detail pages. The filter did not need another pattern because query strings do not change the URL path. The same pattern works when genre or rating filters are applied. This keeps the Books navigation active throughout the books section.

## Q4. Why delete the filter method but keep store and update?

I deleted the old filter method because filtering is now handled by the index method using query strings. The store and update methods are standard resource controller actions for creating and updating books. I kept them empty because the assignment requires them to remain in the controller. Their routes are not registered, so they cannot be reached through those URLs.
