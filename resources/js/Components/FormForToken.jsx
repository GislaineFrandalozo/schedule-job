import { Inertia } from '@inertiajs/inertia'
import React, { useState } from 'react'

export default function FormForToken() {
  const [values, setValues] = useState({
    name: "",
    email: "",
    password: "",
  })

  function handleChange(e) {
    const key = e.target.id;
    const value = e.target.value
    setValues(values => ({
        ...values,
        [key]: value,
    }))
  }

  function handleSubmit(e) {
    e.preventDefault()
    Inertia.post('/teste', values)
  }

  return (
    <form className='flex flex-col' onSubmit={handleSubmit}>
      <label htmlFor="name">Name:</label>
      <input className='bg-slate-400 my-2 h-8 w-1/2' id="name" value={values.name} onChange={handleChange} />
      <label htmlFor="email">Email:</label>
      <input className='bg-slate-400 my-2 h-8 w-1/2' id="email" value={values.email} onChange={handleChange} />
      <label htmlFor="password">Password:</label>
      <input className='bg-slate-400 my-2 h-8 w-1/2' id="password" value={values.password} onChange={handleChange} />
      <button className='bg-red-400 h-10 w-20' type="submit">Submit</button>
    </form>
  )
}