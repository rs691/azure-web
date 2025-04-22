

export default function Contact() {
    return (
    <div>
      <h1>Contact</h1>
      <p>Here are some of my projects.</p>
      <form className="contact-form">
        <label htmlFor="name">Name:</label>
        <input type="text" id="name" name="name" required />
        <label htmlFor="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <button type="submit">Submit</button>
      </form>
      <p className="text-lg">Feel free to reach out!</p>
    </div>
  );
}