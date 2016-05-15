## WebProject
#Following tables are connected to specified functions

1. Controllers -> treat asked operations by user
2. Models -> CRUD system (Create Read Update and Delete on the Database)
3. What user can do on the Website : log in, log out, sign up, create basket, check basket, commit basket, cancel basket, add candy in basket, comment candies, search by name flavor and brand, delete comment, see profile, modify email and pwd
4. What admin can do more : see all profiles, delete user, see all baskets, add a new candy, delete candy

##Users
1. ControllerUser, ControllerProfile (cookies)
2. ModelUser
3. views : connection, registration, profiles, allProfiles, nav

##Candies
1. ControllerCandy
2. ModelCandy
3. views : index, catalog, nav, newCandy

##Baskets / Purchase
1. ControllerBasket
2. ModelBasket
3. views : basket, allBaskets

##Opinions
1. ControllerOpinion
2. ModelOpinion
3. views : opinion, index
