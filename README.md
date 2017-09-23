## HomeBit

Please read the following instructions carefully and completely before attempting the coding exercises.

### Instructions

- This folder is a local git repo. Commit your code in incremental commits for proof-of-work.

- This exercise contains two parts: two coding questions and a project. Commit answers to the relevant directory.

- Use spaces for indentation, not tabs; use unix-style line-endings.

- PHP code must use a tab-width of 4 spaces.

- PHP code must follow PSR coding standards.

- Please comment your code where necessary.

### Coding Exercise

This exercise must use the provided class `Stack` and no other data-structures. Additional scalar variables can be used but no arrays or objects. Avoid using built-in functions for this exercise.

`Stack` implements a `last-in, first-out` data-structure that stores items and returns them in reverse order.

Example:

```PHP
$stack = new Stack();
$stack->push(1);
$stack->push(2);

echo $stack->pop(); // outputs 2
echo $stack->pop(); // outputs 1
echo $stack->pop(); // throws an Exception
```

1. Using only the provided `Stack`, implement a `SizedStack` that:

   - Limits the no. of items that can be pushed on to the stack

     ```PHP
     // create a stack that holds a maximum of 10 items
     $stack = new SizedStack(10);
     ```

   - Throws an exception when no. of items being pushed exceeds the size.

     ```PHP
     // create a stack that holds 1 item
     $stack = new SizedStack(1);

     // this call succeeds
     $stack->push(1);

     // this call should throw an exception
     $stack->push(2);
     ```

2. Using only the provided `Stack`, implement a `Queue` that provides a `first-in, first-out` data-structure i.e., items can only be retrieved in the same order in which they are stored.

  - Provide function `enqueue` that takes one argument (the value to be queued).

  - Provide function `dequeue` that removes the first queued item and returns it.

  - Trying to `dequeue` from an empty queue [i.e., calling `dequeue` before calling `enqueue` should throw an exception].

Example:

```PHP
$queue = new Queue();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);

echo $queue->dequeue(); // outputs 1
echo $queue->dequeue(); // outputs 2
echo $queue->dequeue(); // outputs 3
echo $queue->dequeue(); // throws an Exception
```


### Project
- Use any MVC framework of your choice for this project. Extra points for Laravel.
- Use any SQL of your choice. Extra points for MySQL.
- Provide migrations for all database tables.
- API response must be formatted to [JSend specification](https://labs.omniti.com/labs/jsend).
- Return correct HTTP response codes [`200` for success; `404` for resource not found etc].


#### Requirements and Samples
Build a HTTP API for generic key-value storage. Provide the following HTTP endpoints to:

- Store a key: `POST /{key}.json`

```CURL
// store key 'key-one' with string value 'value-one'
curl -X POST http://localhost/key-one.json \
  -H 'accept: application/json' \
  -d 'value-one'
```

Response [status code `200`]

```json
{
  status: 'success',
  data: {
    key-one: 'value-one'
  }
}
```

```CURL
// store an array as key 'myarray'
curl -X POST http://localhost/myarray.json \
  -H 'accept: application/json' \
  -d '["hello", "world"]'
```
- Retrieve a key: `GET /{key}.json`

```CURL
curl -X GET http://localhost/key-one.json \
  -H 'accept: application/json'
```

Response [status code `200`]

```json
{
  status: 'success',
  data: {
    key-one: 'value-one'
  }
}
```

```CURL
curl -X GET http://localhost/myarray.json \
  -H 'accept: application/json'
```

Response [status code `200`]

```json
{
  status: 'success',
  data: {
    myarray: [ "hello", "world" ]
  }
}
```


```CURL
curl -X GET http://localhost/random-key.json \
  -H 'accept: application/json'
```

Response [status code `404`]

```json
{
  status: 'fail',
  data: { }
}
```

#### Extra Points :-)
- Implement redis cache to avoid hitting the storage for each `GET` request. Cache for 60 seconds.

- Provide a `DELETE /flush.json` endpoint that invalidates all cached keys and values.

- Docker image [built on CentOS 6.8] with your code.