# learn-facade
A simple Facade Class.

```
|-- facade.php          # Facade class
|-- model.php           # User model
|-- runAsModel.php      # php test
|-- runAsFacade.php     # php test
```

### Common
```
<?php

use Model\TestModel\User;
$user = new User();
echo $user->get();
```

### Facade
```
<?php
echo User::get();
```