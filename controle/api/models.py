from django.db import models

# Create your models here.
from django.db import models
from django.contrib.auth.models import AbstractUser

class CustomUser(AbstractUser):
    pass

class Gastos(models.Model):
    nome = models.CharField( max_length=255, null=False, blank=False)
    valor = models.DecimalField(max_digits=8, decimal_places=2, null=False, blank=False)
    horario = models.TimeField(null=True, blank=True)
    data = models.DateField(null=True, blank=True)
    descricao = models.TextField()
    usuario = models.ForeignKey(CustomUser, on_delete=models.CASCADE)

    def __str__(self):
        return self.nome