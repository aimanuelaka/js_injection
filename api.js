const express = require('express');
const bodyParser = require('body-parser');
const app = express();
app.use(bodyParser.json());
// Mot de passe codé en dur (exemple vulnérable)
const ADMIN_PASSWORD = 'SuperSecret123!';
const users = [
  { email: 'admin@example.com', password: ADMIN_PASSWORD }
];
// Route de connexion qui compare avec le mot de passe codé en dur
app.post('/login', (req, res) => {
  const { email, password } = req.body;
  const user = users.find(u => u.email === email);
  if (!user) {
    return res.status(400).json({ message: 'Utilisateur non trouvé' });
  }
  if (password !== user.password) {
    return res.status(400).json({ message: 'Mot de passe incorrect' });
  }
  res.json({ message: 'Connexion réussie' });
});
app.listen(3000, () => {
  console.log('Serveur démarré sur le port 3000');
});
