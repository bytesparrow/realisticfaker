
## Getting Started

### Installation

Faker requires PHP >= 7.1.

```shell
composer require null/realisticfaker
```


### Try Out

To start with an example, add a simple php-file with the contents of:

```php
require 'vendor/autoload.php';
$faker = RealisticFaker\Factory::create();
echo $faker->gender .' | ' .  $faker->firstName . ' ' .$faker->lastName .' | ' .  $faker->email;
```

###Difference to [faker](https://fakerphp.github.io).
Faker is cool. Like you can
```php
$faker = Faker\Factory::create();
echo $faker->firstName . ' | ' .  $faker->jobTitle;
```

which will give you 
 Jayda | Receptionist and Information Clerk
 Daphney | Woodworker
 Hope | Refractory Materials Repairer
and so on

But what isn't cool is if you write
```php
$faker = Faker\Factory::create();
echo $faker->firstName . ' ' .$faker->lastName .' | ' .  $faker->email;
```

it will give you
 Randy DuBuque | mcorkery@gmail.com
 Emelia Thompson | halvorson.lura@mertz.info

That's how faker works (it uses `__get()` magic), but not what we expected. Here RealisticFaker jumps in: 
Based on fakerphp/faker this library gives you the possibility to create (more) realistic fakeprofiles in which e.g. the email-adress matches the person's name

###Usage

```php
$faker = RealisticFaker\Factory::create();
echo $faker->gender .' | ' .  $faker->firstName . ' ' .$faker->lastName .' | ' .  $faker->email;
```

1st call:
 male | Dock Stiedemann | dock.stiedemann@damore.com

2nd call: 
 female | Citlalli Cole | citlalli45@swift.net
... and so on


You can also add an identifier - so the "random" person will be the same on each call (what you would probably want for longer tests using personas).
So basically the functionality of "seeding" ($faker->seed($unique)) is included in the constructor.

```php
$identifier = "admin";
$faker = RealisticFaker\Factory::create($identifier);
echo $faker->gender .' | ' .  $faker->firstName . ' ' .$faker->lastName .' | ' .  $faker->email;
```
this will always give you:
 male | Geovanni Mohr | geovanni.mohr@yahoo.com


of course you can use all the features of the original Faker
```php
echo $faker->jobTitle
echo $faker->address
echo $faker->bankAccountNumber
$faker->addProvider(...);
```

and so on ...

###Internationalization

You can use all the original translations of faker.
Only the constructor is different:
```php
$faker = RealisticFaker\Factory::create("admin", "de_DE");
echo $faker->gender .' | ' .  $faker->firstName . ' ' .$faker->lastName .' | ' .  $faker->email;
```


## License

RealisticFaker is released under the MIT License. See the bundled LICENSE file for details.
