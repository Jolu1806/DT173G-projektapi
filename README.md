# Webbutveckling III

## Projekt - REST api PHP

Den här wbbtjänsten är skapad med PHP och hanterar information som läser ut information till en hemsida.
Den läser in data från en databas och hämtas ut i JSON-format och är implementerad med CRUD.

```
CREATE TABLE `education` (


`id` int(11) NOT NULL,
`dates` text NOT NULL,
`school` text NOT NULL,
`program` text NOT NULL,
`created` timestamp NOT NULL DEFAULT CURRENT\_TIMESTAMP ON UPDATE CURRENT\_TIMESTAMP,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `projects` (
`id` int(11) NOT NULL,
`image` text NOT NULL,
`title` text NOT NULL,
`description` text NOT NULL,
`url` text NOT NULL,
`created` timestamp NOT NULL DEFAULT CURRENT\_TIMESTAMP ON UPDATE CURRENT\_TIMESTAMP,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `work` (
`id` int(11) NOT NULL,
`dates` text NOT NULL,
`company` text NOT NULL,
`title` text NOT NULL,
`created` timestamp NOT NULL DEFAULT CURRENT\_TIMESTAMP ON UPDATE CURRENT\_TIMESTAMP,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
#### Beskrivning av API:ets uppbyggnad
###### config.php 
hämtar in alla klasser
###### course.php 
Är en databasklass som kopplar upp mot databasen. Med olika funktioner innehållandes SQL-frågor kan data hämtas och skickas till databasen.
###### index.php 
hämtar in config.php som i sin tur hämtar in databasklassen. En switch har skapats innehållandes fyra metoder:

* GET-metoden hämtar data from databasen i JSON-format

* POST-metoden skickas data i JSON-format till databasen.
* PUT-metoden skickar med parametrar och sedan uppdaterar befintlig data i databasen. 
* DELETE-metoden skickar med ett ID och raderar det objektet från databasen.
