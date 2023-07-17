<?php

use App\Http\Livewire\Customer;
use App\Models\Customer as ModelsCustomer;

use function Pest\Livewire\livewire;
use function Pest\Laravel\assertDatabaseCount;

 test('name should be required', function () {
    livewire(Customer::class)
        ->set('customerModel.email', 'vJN6G@example.com')
        ->set('customerModel.cpfCnpj', '00000000000')
        ->call('create')
        ->assertHasErrors(['customerModel.name' => 'required']);
 });

 test('name should be string', function () {
    livewire(Customer::class)
        ->set('customerModel.name', 1)
        ->set('customerModel.email', 'vJN6G@example.com')
        ->set('customerModel.cpfCnpj', '00000000000')
        ->call('create')
        ->assertHasErrors(['customerModel.name' => 'string']);
 });

 test('name should be max:255', function () {
    livewire(Customer::class)
        ->set('customerModel.name', str_repeat('x', 256))
        ->call('create')
        ->assertHasErrors(['customerModel.name' => 'max:255']);
 });

 test('name should be min:3', function () {
    livewire(Customer::class)
        ->set('customerModel.name', str_repeat('x', 2))
        ->set('customerModel.email', 'vJN6G@example.com')
        ->set('customerModel.cpfCnpj', '00000000000')
        ->call('create')
        ->assertHasErrors(['customerModel.name' => 'min:3']);
 });


 test('email should be email', function () {
    livewire(Customer::class)
        ->set('customerModel.email', 'not-an-email')
        ->call('create')
        ->assertHasErrors(['customerModel.email' => 'email']);
 });

 test('email should be max:255', function () {
    livewire(Customer::class)
        ->set('customerModel.email', str_repeat('x', 256))
        ->call('create')
        ->assertHasErrors(['customerModel.email' => 'max:255']);
 });

 test('email should be min:3', function () {
    livewire(Customer::class)
        ->set('customerModel.email', str_repeat('x', 2))
        ->call('create')
        ->assertHasErrors(['customerModel.email' => 'min:3']);
 });

 test('cpfCnpj should be required', function () {
    livewire(Customer::class)
        ->call('create')
        ->assertHasErrors(['customerModel.cpfCnpj' => 'required']);
 });

 test('cpfCnpj should be max:14', function () {
    livewire(Customer::class)
        ->set('customerModel.cpfCnpj', str_repeat('x', 15))
        ->call('create')
        ->assertHasErrors(['customerModel.cpfCnpj' => 'max:14']);
 });

 test('cpfCnpj should be min:11', function () {
    livewire(Customer::class)
        ->set('customerModel.cpfCnpj', str_repeat('x', 10))
        ->call('create')
        ->assertHasErrors(['customerModel.cpfCnpj' => 'min:11']);
 });


