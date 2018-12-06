# PHP Rabbitmq

To simulate the more worker is faster than single worker, run `stream.php` one time and `stream2.php` three time. 

Then, execute:

```
$ php send.php && php send2.php
```

You will saw task with more worker will complete first.

## Race Condition

This repository is not talking about race condition as it doesn't involve two or more process attempting to access critical section.

## Have any suggestion and idea?

Open up issue and lets discuss ;)