using API_Sorveteria.Models;

namespace API_Sorveteria.Interfaces
{
    public interface ICategoryRepository
    {
        IList<Category> GetAll();
    }
}
